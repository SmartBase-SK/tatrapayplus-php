<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class MagentoCurlClient {
	public $logger;

	public function __construct( $logger, $scopeConfig ) {
		if ( $scopeConfig->getValue('payment/tatrapayplus/enable_debug_log') == "1" ) {
			$this->logger = $logger;
		} else {
			$this->logger = null;
		}
	}

	public function send( Request $request ) {
		$ch      = curl_init( $request->url );
		$headers = [];

		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $this->convert_headers_to_curl_format( $request->headers ) );
		curl_setopt(
			$ch,
			CURLOPT_HEADERFUNCTION,
			function ( $curl, $header ) use ( &$headers ) {
				$len    = strlen( $header );
				$header = explode( ':', $header, 2 );
				if ( count( $header ) < 2 ) { // ignore invalid headers
					return $len;
				}

				$headers[ strtolower( trim( $header[0] ) ) ][] = trim( $header[1] );

				return $len;
			}
		);
		if ( $request->method === 'POST' ) {
			curl_setopt( $ch, CURLOPT_POST, true );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $request->httpBody );
		} elseif ( $request->method === 'GET' ) {
			curl_setopt( $ch, CURLOPT_HTTPGET, true );
		} elseif ( $request->method === 'PATCH' ) {
			curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PATCH' );
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $request->httpBody );
		} else {
			exit( 'Unsupported request type' );
		}
		if ( $this->logger ) {
			$this->logger->debug( 'Request: ' . (string) $request );
		}

		$response = curl_exec( $ch );

		if ( $response === false ) {
			$error = curl_error( $ch );
			curl_close( $ch );
			if ( $this->logger ) {
				$this->logger->debug( 'Response error: ' . (string) $error );
			}

			return $error;
		}
		$http_status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
		if ( $this->logger ) {
			$this->logger->debug( 'Response success(status: ' . $http_status . '): ' . (string) $response );
		}

		curl_close( $ch );

		return new HttpResponse(
			$response,
			$headers,
			$http_status
		);
	}

	public function convert_headers_to_curl_format( $headers ) {
		$curlHeaders = [];

		foreach ( $headers as $key => $value ) {
			$curlHeaders[] = "{$key}: {$value}";
		}

		return $curlHeaders;
	}
}
