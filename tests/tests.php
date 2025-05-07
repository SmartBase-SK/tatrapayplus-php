<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Tatrapayplus\TatrapayplusApiClient\ApiException;
use Tatrapayplus\TatrapayplusApiClient\HttpResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\AppearanceLogoRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\AppearanceRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\CardPayUpdateInstruction;
use Tatrapayplus\TatrapayplusApiClient\Model\ColorAttribute;
use Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionIPSPData;
use Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionTDSData;
use Tatrapayplus\TatrapayplusApiClient\Model\InitiateDirectTransactionRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\AmountRangeRule;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodRules;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodsListResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\BasePayment;
use Tatrapayplus\TatrapayplusApiClient\Model\Amount;
use Tatrapayplus\TatrapayplusApiClient\Model\E2e;
use Tatrapayplus\TatrapayplusApiClient\Model\RegisterForComfortPayObj;
use Tatrapayplus\TatrapayplusApiClient\Model\Token;
use Tatrapayplus\TatrapayplusApiClient\Model\UserData;
use Tatrapayplus\TatrapayplusApiClient\Model\BankTransfer;
use Tatrapayplus\TatrapayplusApiClient\Model\Address;
use Tatrapayplus\TatrapayplusApiClient\Model\PayLater;
use Tatrapayplus\TatrapayplusApiClient\Model\Order;
use Tatrapayplus\TatrapayplusApiClient\Model\CardDetail;
use Tatrapayplus\TatrapayplusApiClient\Model\OrderItem;
use Tatrapayplus\TatrapayplusApiClient\Model\ItemDetail;
use Tatrapayplus\TatrapayplusApiClient\Model\ItemDetailLangUnit;
use Tatrapayplus\TatrapayplusApiClient\CurlClient;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusLogger;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;
use Tatrapayplus\TatrapayplusApiClient\Api\TatraPayPlusAPIApi;

final class Tests extends TestCase
{
    private string $client_id;
    private string $client_secret;

    public function __construct()
    {
        parent::__construct();
        $this->client_id = getenv("TATRAPAY_CLIENT_ID");
        $this->client_secret = getenv("TATRAPAY_CLIENT_SECRET");
    }

    private function getDirectTransactionPayload(
        float $total,
        string $currency,
    ): InitiateDirectTransactionRequest
    {
        $address = new Address([
            "street_name" => "TestStreet",
            "building_number" => "12",
            "town_name" => "Town",
            "post_code" => "97405",
            "country" => "SK",
        ]);

        $request_data = new InitiateDirectTransactionRequest([
            "amount" => new Amount([
                "amount_value" => $total,
                "currency" => $currency,
            ]),
            "is_pre_authorization" => true,
            "end_to_end" => new E2e([
                "variable_symbol" => "123",
            ]),
            "tds_data" => new DirectTransactionTDSData([
                "card_holder" => "Janko Hraško",
                "email" => "janko.hrasko@example.com",
                "billing_address" => $address,
                "shipping_address" => $address,
            ]),
            "ipsp_data" => new DirectTransactionIPSPData([
                "sub_merchant_id" => "12345",
                "name" => "Test 123",
                "location" => "Test 123",
                "country" => "SK",
            ]),
            "token" => new Token([
                "google_pay_token" => "ABC12345"
            ]),
        ]);
        return $request_data;
    }

    private function getPaymentPayload(
        float $total,
        string $currency,
        bool $save_card = false
    ): InitiatePaymentRequest {
        $order_id = uniqid();

        $basePayment = new BasePayment([
            "instructed_amount" => new Amount([
                "amount_value" => $total,
                "currency" => $currency,
            ]),
            "end_to_end" => new E2e([
                "variable_symbol" => "123",
            ]),
        ]);

        $userData = new UserData([
            "first_name" => "Janko",
            "last_name" => "Hrasko",
            "email" => "janko.hrasko@example.com",
        ]);

        $bankTransfer = new BankTransfer();
        $billingAddress = new Address([
            "street_name" => "TestStreet",
            "building_number" => "12",
            "town_name" => "Town",
            "post_code" => "97405",
            "country" => "SK",
        ]);
        $shippingAddress = new Address([
            "street_name" => "TestStreet",
            "building_number" => "12",
            "town_name" => "Town",
            "post_code" => "97405",
            "country" => "SK",
        ]);
        $card_holder = "Janko Hraško";

        $payLater = new PayLater([
            "order" => new Order([
                "order_no" => $order_id,
                "order_items" => [
                    new OrderItem([
                        "quantity" => 1.0,
                        "total_item_price" => $total,
                        "item_detail" => new ItemDetail([
                            "item_detail_sk" => new ItemDetailLangUnit([
                                "item_name" => "test product1",
                            ]),
                        ]),
                    ]),
                ],
            ]),
        ]);
        $cardDetail = new CardDetail([
            "card_holder" => $card_holder,
            "billing_address" => $billingAddress,
            "shipping_address" => $shippingAddress,
        ]);
        if ($save_card) {
            $cardDetail->setComfortPay(
                new RegisterForComfortPayObj([
                    "register_for_comfort_pay" => true,
                ])
            );
        }

        return new InitiatePaymentRequest([
            "base_payment" => $basePayment,
            "bank_transfer" => $bankTransfer,
            "user_data" => $userData,
            "card_detail" => $cardDetail,
            "pay_later" => $payLater,
        ]);
    }

    public function testGenerateSignedCardId(): void
    {
        $public_key_content = file_get_contents(
            dirname(dirname(__FILE__)) . "/tests/ECID_PUBLIC_KEY_2023.txt"
        );
        $signed_card_id = TatraPayPlusAPIApi::generateSignedCardId(
            "123",
            $public_key_content
        );
        $this->assertTrue(is_string($signed_card_id));
    }

    public function testLimitLength(): void
    {
        $result = TatraPayPlusService::limit_length("test123", 4);
        $this->assertSame($result, "test");
    }

    public function testRemoveDiacritics(): void
    {
        $initiate_payment_request = $this->getPaymentPayload(10, "EUR");

        $this->assertSame(
            $initiate_payment_request->getCardDetail()->getCardHolder(),
            "Janko Hrasko"
        );
    }

    public function testGetAvailablePaymentMethods(): void
    {
        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret
        );

        $available_methods = $api_instance->getAvailableMethods();

        $this->assertTrue(is_array($available_methods));
        $this->assertSame(
            $available_methods["CARD_PAY"]["supported_currencies"],
            ["EUR", "USD"]
        );
    }

    public function testGetAvailablePaymentMethodsConditional(): void
    {
        $mocked_methods = [
            new PaymentMethodRules([
                "supported_currency" => ["EUR"],
                "paymentMethod" => "TEST1",
                "amount_range_rule" => new AmountRangeRule([
                    "min_amount" => 1,
                    "max_amount" => 1000,
                ]),
            ]),
            new PaymentMethodRules([
                "supported_currency" => ["EUR", "USD"],
                "paymentMethod" => "TEST2",
            ]),
            new PaymentMethodRules([
                "supported_currency" => ["EUR"],
                "supported_country" => ["SK", "CZ"],
                "paymentMethod" => "TEST3",
            ]),
        ];
        $mocked_result = new PaymentMethodsListResponse([
            "payment_methods" => $mocked_methods,
        ]);
        $parsed_response = [
            "object" => $mocked_result,
            "response" => null,
        ];

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["getMethods"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance
            ->method("getMethods")
            ->will($this->returnValue($parsed_response));

        $test_cases = [
            // amount, currency, country, expected_methods
            [100, "EUR", null, ["TEST1", "TEST2", "TEST3"]],
            [10, "USD", "SK", ["TEST2"]],
            [1001, "EUR", null, ["TEST2", "TEST3"]],
            [10, "EUR", "HUN", ["TEST1", "TEST2"]],
        ];

        foreach (
            $test_cases
            as [$amount, $currency, $country, $expected_methods]
        ) {
            $available_methods = $api_instance->getAvailableMethods(
                $amount,
                $currency,
                $country
            );

            foreach ($expected_methods as $expected_method) {
                $this->assertTrue(
                    array_key_exists($expected_method, $available_methods)
                );
            }
        }
    }

    public function testInitiatePaymentCheckPaymentStatus(): void
    {
        $accept_language = "sk";
        $preferred_method = null;
        $initiate_payment_request = $this->getPaymentPayload(10, "EUR");

        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret
        );

        $response = $api_instance->initiatePayment(
            "http://localhost",
            $initiate_payment_request,
            $preferred_method,
            $accept_language
        );

        $this->assertFalse(is_null($response["object"]));
        $this->assertFalse(is_null($response["response"]));

        $payment_id = $response["object"]->getPaymentId();
        $this->assertFalse(is_null($payment_id));

        $response = $api_instance->getPaymentIntentStatus($payment_id);

        $this->assertFalse(is_null($response["object"]));
        $this->assertSame($response["response"]->getStatusCode(), 200);
        $this->assertSame(
            $response["object"]->getAuthorizationStatus(),
            PaymentIntentStatusResponse::AUTHORIZATION_STATUS__NEW
        );
        $this->assertSame(
            $response["object"]->getSimpleStatus(),
            PaymentIntentStatusResponse::SIMPLE_STATUS_PENDING
        );
    }

    public function testCancelPaymentIntent(): void
    {
        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret
        );
        $initiate_payment_request = $this->getPaymentPayload(10, "EUR");

        $response = $api_instance->initiatePayment(
            "http://localhost",
            $initiate_payment_request
        );

        $this->assertFalse(is_null($response["object"]));
        $this->assertFalse(is_null($response["response"]));

        $payment_id = $response["object"]->getPaymentId();
        $this->assertFalse(is_null($payment_id));

        $response = $api_instance->cancelPaymentIntent($payment_id);
        $this->assertSame($response["response"]->getStatusCode(), 200);
    }

    public function testUpdatePaymentIntent(): void
    {
        $mock_response = new HttpResponse([], [], 201);

        $mock_client = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(["send"])
            ->getMock();
        $mock_client->method("send")->will($this->returnValue($mock_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["addAuthHeader"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance
            ->method("addAuthHeader")
            ->will($this->returnCallback("mock_addAuthHeader"));
        $api_instance->setClient($mock_client);

        $data = new CardPayUpdateInstruction([
            "operation_type" =>
                CardPayUpdateInstruction::OPERATION_TYPE_CHARGEBACK,
            "amount" => 3.0,
        ]);
        $response = $api_instance->updatePaymentIntent("TEST123", $data);

        $this->assertSame($response["response"]->getStatusCode(), 201);
    }

    public function testSavedCard(): void
    {
        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret
        );
        $initiate_payment_request = $this->getPaymentPayload(10, "EUR", true);

        $response = $api_instance->initiatePayment(
            "http://localhost",
            $initiate_payment_request
        );

        $this->assertFalse(is_null($response["object"]));
        $this->assertFalse(is_null($response["response"]));

        $payment_id = $response["object"]->getPaymentId();
        $this->assertFalse(is_null($payment_id));
    }

    public function testSavedCardResponseMocked(): void
    {
        $mocked_status = json_encode([
            "selectedPaymentMethod" => "CARD_PAY",
            "authorizationStatus" => "AUTH_DONE",
            "status" => [
                "status" => "OK",
                "currency" => "EUR",
                "maskedCardNumber" => "440577******5558",
                "comfortPay" => ["cid" => "123", "status" => "OK"],
            ],
        ]);
        $mock_response = new HttpResponse($mocked_status, [], 201);

        $mock_client = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(["send"])
            ->getMock();
        $mock_client->method("send")->will($this->returnValue($mock_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["addAuthHeader"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance
            ->method("addAuthHeader")
            ->will($this->returnCallback("mock_addAuthHeader"));
        $api_instance->setClient($mock_client);

        $response = $api_instance->getPaymentIntentStatus("12345");

        $this->assertFalse(is_null($response["object"]));
        $this->assertSame($response["response"]->getStatusCode(), 201);
        $this->assertSame(
            $response["object"]->getSimpleStatus(),
            PaymentIntentStatusResponse::SIMPLE_STATUS_ACCEPTED
        );
        $status_obj = $response["object"]->getStatus();
        $this->assertSame($status_obj->getComfortPay()->getCid(), "123");
        $this->assertSame(
            $status_obj->getMaskedCardNumber(),
            "440577******5558"
        );
    }

    public function testSetAppearance(): void
    {
        $appearance_request = new AppearanceRequest([
            "theme" => AppearanceRequest::THEME_SYSTEM,
            "tint_on_accent" => new ColorAttribute([
                "color_dark_mode" => "#fff",
                "color_light_mode" => "#fff",
            ]),
            "tint_accent" => new ColorAttribute([
                "color_dark_mode" => "#fff",
                "color_light_mode" => "#fff",
            ]),
            "surface_accent" => new ColorAttribute([
                "color_dark_mode" => "#fff",
                "color_light_mode" => "#fff",
            ]),
        ]);
        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret
        );

        $response = $api_instance->setAppearance($appearance_request);
        $this->assertSame($response["response"]->getStatusCode(), 201);
    }

    public function testSetLogoMocked(): void
    {
        $mock_response = new HttpResponse([], [], 201);

        $mock_client = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(["send"])
            ->getMock();
        $mock_client->method("send")->will($this->returnValue($mock_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["addAuthHeader"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance
            ->method("addAuthHeader")
            ->will($this->returnCallback("mock_addAuthHeader"));
        $api_instance->setClient($mock_client);

        $logo_request = new AppearanceLogoRequest([
            "logo_image" =>
                "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAgAAAAIAQMAAAD+wSzIAAAABlBMVEX///+/v7+jQ3Y5AAAADklEQVQI12P4AIX8EAgALgAD/aNpbtEAAAAASUVORK5CYII",
        ]);
        $response = $api_instance->setLogo($logo_request);
        $this->assertSame($response["response"]->getStatusCode(), 201);
    }

    public function testRetry(): void
    {
        $send_count = TatraPayPlusAPIApi::RETRIES;
        $mock_error_body = json_encode(["error" => "testError1"]);
        $mock_error_response = new HttpResponse($mock_error_body, [], 500);

        $mock_client = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(["send"])
            ->getMock();
        $mock_client
            ->expects($this->exactly($send_count))
            ->method("send")
            ->will($this->returnValue($mock_error_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["addAuthHeader"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance->setClient($mock_client);
        $api_instance
            ->method("addAuthHeader")
            ->will($this->returnCallback("mock_addAuthHeader"));

        $error_thrown = false;
        try {
            $api_instance->getAvailableMethods();
        } catch (ApiException $e) {
            $error_thrown = true;
            $this->assertSame(500, $e->getCode());
            $this->assertSame($mock_error_body, $e->getResponseBody());
        }
        $this->assertTrue($error_thrown);
    }

    public function testLogger()
    {
        $logger = new TestLogger();
        $api_instance = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret,
            $logger,
            mode: TatraPayPlusAPIApi::SANDBOX
        );

        $api_instance->getAvailableMethods();
        // 7 - token operation, 9 - getMethods operation
        $this->assertSame(16, count($logger->lines));
    }

    public function testInitiateDirectTransactionMocked(): void
    {
        $mock_response_body = json_encode(
            array(
                "paymentId" => "123456789",
                "redirectFormHtml" => "custom HTML"
            )
        );
        $mock_response = new HttpResponse($mock_response_body, [], 201);
        $mock_client = $this->getMockBuilder(CurlClient::class)
            ->onlyMethods(["send"])
            ->getMock();
        $mock_client->method("send")->will($this->returnValue($mock_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)
            ->onlyMethods(["addAuthHeader"])
            ->setConstructorArgs([$this->client_id, $this->client_secret])
            ->getMock();
        $api_instance
            ->method("addAuthHeader")
            ->will($this->returnCallback("mock_addAuthHeader"));
        $api_instance->setClient($mock_client);

        $request_data = $this->getDirectTransactionPayload(10, "EUR");

        $response = $api_instance->initiateDirectTransaction(
            "http://localhost",
            $request_data,
        );

        $this->assertFalse(is_null($response["object"]));
        $this->assertFalse(is_null($response["response"]));

        $this->assertSame("123456789", $response["object"]->getPaymentId());
        $this->assertSame("custom HTML", $response["object"]->getRedirectFormHtml());
    }
}

function mock_addAuthHeader($headers)
{
    return $headers;
}


class TestLogger extends TatraPayPlusLogger
{
    public array $lines = [];

    public array $mask_body_fields = [
        "access_token",
    ];

    public function writeLine(string $line): void
    {
        $this->lines[] = $line;
    }
}
