<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class OpencartCurlClient3
{
    /**
     * @var bool
     */
    public $log_to_file = false;

    public function __construct($log_to_file = false)
    {
        if ($log_to_file == 'yes') {
            $this->log_to_file = true;
        } else {
            $this->log_to_file = false;
        }
    }

    public function send(Request $request)
    {
        $ch = curl_init($request->url);
        $headers = [];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->convert_headers_to_curl_format($request->headers));
        curl_setopt(
            $ch,
            CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$headers) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) { // ignore invalid headers
                    return $len;
                }

                $headers[strtolower(trim($header[0]))][] = trim($header[1]);

                return $len;
            }
        );
        if ($request->method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->httpBody);
        } elseif ($request->method === 'GET') {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        } elseif ($request->method === 'PATCH') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->httpBody);
        } else {
            exit('Unsupported request type');
        }

        $logger = new OpencartFileLogger3($this->log_to_file);
        $logger->info('Request: ' . (string) $request);

        $response = curl_exec($ch);

        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            $logger->info('Response error: ' . (string) $error);

            return $error;
        }
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $logger->info('Response success(status: ' . $http_status . '): ' . (string) $response);

        curl_close($ch);

        return new HttpResponse(
            $response,
            $headers,
            $http_status
        );
    }

    public function convert_headers_to_curl_format($headers)
    {
        $curlHeaders = [];

        foreach ($headers as $key => $value) {
            $curlHeaders[] = "{$key}: {$value}";
        }

        return $curlHeaders;
    }
}
