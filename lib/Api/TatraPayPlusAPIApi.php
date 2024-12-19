<?php

namespace Tatrapayplus\TatrapayplusApiClient\Api;

use Tatrapayplus\TatrapayplusApiClient\ApiException;
use Tatrapayplus\TatrapayplusApiClient\Configuration;
use Tatrapayplus\TatrapayplusApiClient\HeaderSelector;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod;
use Tatrapayplus\TatrapayplusApiClient\Model\SanitizedInvalidArgumentException;
use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;
use Tatrapayplus\TatrapayplusApiClient\Request;

class TatraPayPlusAPIApi
{
    /** @var string[] * */
    public const contentTypes = [
        'cancelPaymentIntent' => [
            'application/json',
        ],
        'getMethods' => [
            'application/json',
        ],
        'getPaymentIntentStatus' => [
            'application/json',
        ],
        'initiatePayment' => [
            'application/json',
        ],
        'updatePaymentIntent' => [
            'application/json',
        ],
        'token' => [
            'application/x-www-form-urlencoded',
        ],
        'setAppearance' => [
            'application/json',
        ],
        'setLogo' => [
            'application/json',
        ],
    ];
    /**
     * @var object
     */
    protected $client;
    /**
     * @var Configuration
     */
    protected $config;
    /**
     * @var HeaderSelector
     */
    protected $headerSelector;
    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param object $client
     * @param Configuration $config
     * @param HeaderSelector $selector
     */
    public function __construct(
        Configuration $config,
        ?object $client = null,
        ?HeaderSelector $selector = null
    ) {
        $this->config = $config;
        $this->client = $client;
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation cancelPaymentIntent
     *
     * Cancel payment intent.
     *
     * @param string $payment_id payment intent identifier (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function cancelPaymentIntent($payment_id)
    {
        $request = $this->cancelPaymentIntentRequest($payment_id);

        return $this->processRequest($request, null, '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'cancelPaymentIntent'
     *
     * @param string $payment_id payment intent identifier (required)
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function cancelPaymentIntentRequest($payment_id)
    {
        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $payment_id when calling cancelPaymentIntent');
        }

        $resourcePath = '/v1/payments/{payment-id}';
        $resourcePath = str_replace(
            '{payment-id}',
            ObjectSerializer::toPathValue($payment_id),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['cancelPaymentIntent'][0],
            false
        );

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $operationHost = $this->config->getHost();

        return new Request(
            'DELETE',
            $operationHost . $resourcePath,
            $headers,
        );
    }

    public function getDefaultHeaders()
    {
        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }
        $defaultHeaders['X-Request-ID'] = $this->uuid4();

		if(isset($_SERVER['REMOTE_ADDR'])) {
			if (function_exists('sanitize_text_field')) {
				$remote_addr = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
			} else {
				// This line won't be used by WP.
				$remote_addr = $_SERVER['REMOTE_ADDR']; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.MissingUnslash,WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			}
		} else {
			$remote_addr = '127.0.0.1';
		}


        $ip_array = explode(',', $remote_addr);
        $ip_array = array_map('trim', $ip_array);
	    $good_ip = '127.0.0.1';
	    foreach ($ip_array as $ip) {
		    $filter = filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
		    if ($filter === false) {
			    continue;
		    } else {
				$good_ip = $ip;
				break;
			}
	    }
        $defaultHeaders['IP-Address'] = $good_ip;

        return $defaultHeaders;
    }

    public static function uuid4()
    {
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0F | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3F | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function processRequest($request, $target_structure, $error_structure)
    {
        try {
            try {
                $response = $this->client->send($request);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri(), (string) $response->getBody()), $statusCode, $response->getHeaders(), (string) $response->getBody(), (string) $request);
            }

            if (!is_null($target_structure)) {
                $content = (string) $response->getBody();
                try {
                    $content = static::json_decode($content, false, 512, JSON_THROW_ON_ERROR);
                } catch (\JsonException $exception) {
                    throw new ApiException(sprintf('Error JSON decoding server response (%s)', $request->getUri()), $statusCode, $response->getHeaders(), $content);
                }
            }

            switch ($statusCode) {
                case 200:
                case 201:
                    return [
                        'object' => is_null($target_structure) ? null : ObjectSerializer::deserialize($content, $target_structure, []),
                        'response' => $response,
                    ];
            }

            $content = $response->getBody();

            return [
                'object' => is_null($target_structure) ? null : ObjectSerializer::deserialize($content, $target_structure, []),
                'response' => $response,
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        $error_structure,
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    public static function json_decode(...$args)
    {
        return json_decode(...$args);
    }

    /**
     * Operation getMethods
     *
     * Payment methods list
     *
     * @return array of \Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodsListResponse|\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function getMethods()
    {
        $request = $this->getMethodsRequest();

        return $this->processRequest($request, '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodsListResponse', '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'getMethods'
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function getMethodsRequest()
    {
        $resourcePath = '/v1/payments/methods';
        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['getMethods'][0],
            false
        );
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $operationHost = $this->config->getHost();

        return new Request(
            'GET',
            $operationHost . $resourcePath,
            $headers,
        );
    }

    /**
     * Operation getPaymentIntentStatus
     *
     * Payment intent status.
     *
     * @param string $payment_id payment intent identifier (required)
     *
     * @return array of \Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponse|\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function getPaymentIntentStatus($payment_id)
    {
        $request = $this->getPaymentIntentStatusRequest($payment_id);

        return $this->processRequest($request, '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponse', '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'getPaymentIntentStatus'
     *
     * @param string $payment_id payment intent identifier (required)
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function getPaymentIntentStatusRequest($payment_id)
    {
        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $payment_id when calling getPaymentIntentStatus');
        }

        $resourcePath = '/v1/payments/{payment-id}/status';
        $queryParams = [];
        $headerParams = [];

        // path params
        if ($payment_id !== null) {
            $resourcePath = str_replace(
                '{payment-id}',
                ObjectSerializer::toPathValue($payment_id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['getPaymentIntentStatus'][0],
            false
        );

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
        );
    }

    /**
     * Operation initiatePayment
     *
     * Initiate payment intent
     *
     * @param string $redirect_uri URI of the client application endpoint, where the user shall be redirected to after payment process. URI has to be registered in Developer portal (required)
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentRequest $initiate_payment_request **The table bellow describes required objects for specific payment method**  | Base structures      | Mandatory for Payment method  | | ---------------- | ------------| | basePayment    | Always mandatory     | | userData              | CARD_PAY,  PAY_LATER|  | Method specific structures      | Mandatory for Payment method  | | ---------------- | ------------| | bankTransfer              | BANK_TRANSFER | | cardDetail              | CARD_PAY| | payLater              | PAY_LATER| (required)
     * @param PaymentMethod $preferred_method Preferred payment intent method (optional)
     * @param string $accept_language The \&quot;Accept-Language\&quot; header field is used by user agents to indicate the set of natural languages that are preferred. Available \&quot;en\&quot; and \&quot;sk\&quot; (optional, default to 'sk')
     *
     * @return array of \Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentResponse|\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function initiatePayment($redirect_uri, $initiate_payment_request, $preferred_method = null, $accept_language = 'sk')
    {
        $request = $this->initiatePaymentRequest($redirect_uri, $initiate_payment_request, $preferred_method, $accept_language);

        return $this->processRequest($request, '\Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentResponse', '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'initiatePayment'
     *
     * @param string $redirect_uri URI of the client application endpoint, where the user shall be redirected to after payment process. URI has to be registered in Developer portal (required)
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentRequest $initiate_payment_request **The table bellow describes required objects for specific payment method**  | Base structures      | Mandatory for Payment method  | | ---------------- | ------------| | basePayment    | Always mandatory     | | userData              | CARD_PAY,  PAY_LATER|  | Method specific structures      | Mandatory for Payment method  | | ---------------- | ------------| | bankTransfer              | BANK_TRANSFER | | cardDetail              | CARD_PAY| | payLater              | PAY_LATER| (required)
     * @param PaymentMethod $preferred_method Preferred payment intent method (optional)
     * @param string $accept_language The \&quot;Accept-Language\&quot; header field is used by user agents to indicate the set of natural languages that are preferred. Available \&quot;en\&quot; and \&quot;sk\&quot; (optional, default to 'sk')
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function initiatePaymentRequest($redirect_uri, $initiate_payment_request, $preferred_method = null, $accept_language = 'sk')
    {
        // verify the required parameter 'redirect_uri' is set
        if ($redirect_uri === null || (is_array($redirect_uri) && count($redirect_uri) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $redirect_uri when calling initiatePayment');
        }

        // verify the required parameter 'initiate_payment_request' is set
        if ($initiate_payment_request === null || (is_array($initiate_payment_request) && count($initiate_payment_request) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $initiate_payment_request when calling initiatePayment');
        }

        $resourcePath = '/v1/payments';
        $queryParams = [];
        $headerParams = [];

        // header params
        if ($redirect_uri !== null) {
            $headerParams['Redirect-URI'] = ObjectSerializer::toHeaderValue($redirect_uri);
        }
        // header params
        if ($preferred_method !== null) {
            $headerParams['Preferred-Method'] = ObjectSerializer::toHeaderValue($preferred_method);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = ObjectSerializer::toHeaderValue($accept_language);
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['initiatePayment'][0],
            false
        );

        $httpBody = static::json_encode(ObjectSerializer::sanitizeForSerialization($initiate_payment_request));
        $httpBody = str_replace('\\\\n', '\\n', $httpBody);
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    public static function json_encode(...$args)
    {
	    // Store the current precision
	    $ini_value = ini_get( 'serialize_precision' );

		// Set the new precision and export the variable
		ini_set( 'serialize_precision', -1 );

		if (function_exists('wp_json_encode')) {
            $result = wp_json_encode(...$args);
        } else {
            // fallback for non Wordpress environment
	        $result = json_encode(...$args); // phpcs:ignore WordPress.WP.AlternativeFunctions.json_encode_json_encode
        }

	    // Restore the previous value
	    ini_set( 'serialize_precision', $ini_value );
		return $result;
    }

    /**
     * Operation updatePaymentIntent
     *
     * Update payment intent
     *
     * @param string $payment_id payment intent identifier (required)
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayUpdateInstruction $body **TatraPayPlus update request**  | Payment method      | mandatory structure | | ---------------- | ------------| | BANK_TRANSFER              | N/A     | | CARD_PAY              | cardPayUpdateInstruction | | PAY_LATER               | N/A | (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function updatePaymentIntent($payment_id, $body)
    {
        $request = $this->updatePaymentIntentRequest($payment_id, $body);

        return $this->processRequest($request, null, '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'updatePaymentIntent'
     *
     * @param string $payment_id payment intent identifier (required)
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayUpdateInstruction $body **TatraPayPlus update request**  | Payment method      | mandatory structure | | ---------------- | ------------| | BANK_TRANSFER              | N/A     | | CARD_PAY              | cardPayUpdateInstruction | | PAY_LATER               | N/A | (required)
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function updatePaymentIntentRequest($payment_id, $body)
    {
        // verify the required parameter 'payment_id' is set
        if ($payment_id === null || (is_array($payment_id) && count($payment_id) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $payment_id when calling updatePaymentIntent');
        }

        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $body when calling updatePaymentIntent');
        }

        $resourcePath = '/v1/payments/{payment-id}';
        $queryParams = [];
        $headerParams = [];

        $headerParams['Idempotency-Key'] = ObjectSerializer::toHeaderValue($this->uuid4());

        $resourcePath = str_replace(
            '{payment-id}',
            ObjectSerializer::toPathValue($payment_id),
            $resourcePath
        );

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['updatePaymentIntent'][0],
            false
        );

        $httpBody = static::json_encode(ObjectSerializer::sanitizeForSerialization($body));

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'PATCH',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    public function token($grant_type, $client_id, $client_secret, $scope)
    {
        $request = $this->tokenRequest($grant_type, $client_id, $client_secret, $scope);

        return $this->processRequest($request, '\Tatrapayplus\TatrapayplusApiClient\Model\TokenSuccessResponseType', '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    public function tokenRequest($grant_type, $client_id, $client_secret, $scope)
    {
        // verify the required parameter '$grant_type' is set
        if ($grant_type === null || (is_array($grant_type) && count($grant_type) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $grant_type when calling tokenRequest');
        }

        // verify the required parameter '$client_id' is set
        if ($client_id === null || (is_array($client_id) && count($client_id) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $client_id when calling tokenRequest');
        }

        // verify the required parameter '$client_secret' is set
        if ($client_secret === null || (is_array($client_secret) && count($client_secret) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $client_secret when calling tokenRequest');
        }

        // verify the required parameter '$scope' is set
        if ($scope === null || (is_array($scope) && count($scope) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $scope when calling tokenRequest');
        }

        $resourcePath = '/auth/oauth/v2/token';
        $formParams = [
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'scope' => $scope,
        ];

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['token'][0],
            false
        );
        $httpBody = ObjectSerializer::buildQuery($formParams);

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $operationHost = $this->config->getHost();

        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation setAppearanceWithHttpInfo
     *
     * Set appearance parameters for TatraPayPlus
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\AppearanceRequest $appearance_request Appearance request body (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function setAppearance($appearance_request)
    {
        $request = $this->setAppearanceRequest($appearance_request);

        return $this->processRequest($request, null, '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'setAppearance'
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\AppearanceRequest $appearance_request Appearance request body (required)
     *
     * @return Request
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function setAppearanceRequest($appearance_request)
    {
        // verify the required parameter 'appearance_request' is set
        if ($appearance_request === null || (is_array($appearance_request) && count($appearance_request) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $appearance_request when calling setAppearance');
        }

        $resourcePath = '/v1/appearances';

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['setAppearance'][0],
            false
        );

        $httpBody = static::json_encode(ObjectSerializer::sanitizeForSerialization($appearance_request));

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $operationHost = $this->config->getHost();

        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }

    /**
     * Operation setLogoWithHttpInfo
     *
     * Set logo for TatraPayPlus
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\AppearanceLogoRequest $appearance_logo_request (required)
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws SanitizedInvalidArgumentException
     * @throws ApiException on non-2xx response or if the response body is not in the expected format
     */
    public function setLogo($appearance_logo_request)
    {
        $request = $this->setLogoRequest($appearance_logo_request);

        return $this->processRequest($request, null, '\Tatrapayplus\TatrapayplusApiClient\Model\Model400ErrorBody');
    }

    /**
     * Create request for operation 'setLogo'
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\AppearanceLogoRequest $appearance_logo_request (required)
     *
     * @throws SanitizedInvalidArgumentException
     */
    public function setLogoRequest($appearance_logo_request)
    {
        // verify the required parameter 'appearance_logo_request' is set
        if ($appearance_logo_request === null || (is_array($appearance_logo_request) && count($appearance_logo_request) === 0)) {
            throw new SanitizedInvalidArgumentException('Missing the required parameter $appearance_logo_request when calling setLogo');
        }

        $resourcePath = '/v1/appearances/logo';

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            self::contentTypes['setLogo'][0],
            false
        );

        $httpBody = static::json_encode(ObjectSerializer::sanitizeForSerialization($appearance_logo_request));

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = $this->getDefaultHeaders();

        $headers = array_merge(
            $defaultHeaders,
            $headers
        );

        $operationHost = $this->config->getHost();

        return new Request(
            'POST',
            $operationHost . $resourcePath,
            $headers,
            $httpBody
        );
    }
}
