<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Tatrapayplus\TatrapayplusApiClient\HttpResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\CardPayUpdateInstruction;
use Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\AmountRangeRule;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodRules;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethodsListResponse;
use Tatrapayplus\TatrapayplusApiClient\Model\BasePayment;
use Tatrapayplus\TatrapayplusApiClient\Model\Amount;
use Tatrapayplus\TatrapayplusApiClient\Model\E2e;
use Tatrapayplus\TatrapayplusApiClient\Model\UserData;
use Tatrapayplus\TatrapayplusApiClient\Model\BankTransfer;
use Tatrapayplus\TatrapayplusApiClient\Model\Address;
use Tatrapayplus\TatrapayplusApiClient\Model\PayLater;
use Tatrapayplus\TatrapayplusApiClient\Model\Order;
use Tatrapayplus\TatrapayplusApiClient\Model\CardDetail;
use Tatrapayplus\TatrapayplusApiClient\Model\OrderItem;
use Tatrapayplus\TatrapayplusApiClient\Model\ItemDetail;
use Tatrapayplus\TatrapayplusApiClient\Model\ItemDetailLangUnit;
use Tatrapayplus\TatrapayplusApiClient\Configuration;
use Tatrapayplus\TatrapayplusApiClient\CurlClient;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;
use Tatrapayplus\TatrapayplusApiClient\Api\TatraPayPlusAPIApi;


final class Tests extends TestCase
{
    private string $client_id;
    private string $client_secret;

    public function __construct()
    {
        parent::__construct();
        $this->client_id = getenv('TATRAPAY_CLIENT_ID');
        $this->client_secret = getenv('TATRAPAY_CLIENT_SECRET');

    }

    public function testLimitLength(): void
    {
        $result = TatraPayPlusService::limit_length('test123', 4);
        $this->assertSame($result, 'test');
    }

    public function testRemoveDiacritics(): void
    {
        $initiate_payment_request = $this->getPaymentPayload(10, 'EUR');

        $this->assertSame($initiate_payment_request->getCardDetail()->getCardHolder(), 'Janko Hrasko');
    }

    public function testGetAvailablePaymentMethods(): void
    {
        $api_instance  = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret,
        );

        $available_methods = $api_instance->getAvailableMethods();

        $this->assertTrue(is_array($available_methods));
        $this->assertSame($available_methods['CARD_PAY']['supported_currencies'], ['EUR', 'USD']);
    }

    public function testGetAvailablePaymentMethodsConditional(): void
    {
        $mocked_methods = array(
            new PaymentMethodRules(
                array(
                    "supported_currency" => ["EUR"],
                    "paymentMethod" => "TEST1",
                    "amount_range_rule" => new AmountRangeRule(
                        array(
                            "min_amount" => 1,
                            "max_amount" => 1000,
                        )
                    ),
                ),
            ),
            new PaymentMethodRules(
                array(
                    "supported_currency" => ["EUR", "USD"],
                    "paymentMethod" => "TEST2",
                ),
            ),
            new PaymentMethodRules(
                array(
                    "supported_currency" => ["EUR"],
                    "supported_country" => ["SK", "CZ"],
                    "paymentMethod" => "TEST3",
                ),
            ),
        );
        $mocked_result = new PaymentMethodsListResponse(
            array(
                'payment_methods' => $mocked_methods
            )
        );
        $parsed_response = array(
            'object' => $mocked_result,
            'response' => null
        );

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)->onlyMethods(['getMethods',])->setConstructorArgs([$this->client_id, $this->client_secret])->getMock();
        $api_instance->method('getMethods')->will($this->returnValue($parsed_response));

        $test_cases = array(
            // amount, currency, country, expected_methods
            array(100, 'EUR', null, ["TEST1", "TEST2", "TEST3"]),
            array(10, 'USD', 'SK', ["TEST2"]),
            array(1001, 'EUR', null, ["TEST2", "TEST3"]),
            array(10, 'EUR', 'HUN', ["TEST1", "TEST2"]),
        );

        foreach ($test_cases as [$amount, $currency, $country, $expected_methods]) {
            $available_methods = $api_instance->getAvailableMethods($amount, $currency, $country);

            foreach ($expected_methods as $expected_method) {
                $this->assertTrue(array_key_exists($expected_method, $available_methods));
            }
        }
    }

    private function getPaymentPayload($total, $currency)
    {
        $order_id = uniqid();

        $basePayment      = new BasePayment( [
            'instructed_amount' => new Amount( [
                'amount_value' => $total,
                'currency'     => $currency,
            ] ),
            'end_to_end'        => new E2e( [
                'variable_symbol' => '123',
            ] ),
        ] );

        $userData = new UserData( [
            'first_name' => 'Janko',
            'last_name'  => 'Hrasko',
            'email'      => 'janko.hrasko@test.sk',
        ] );

        $bankTransfer    = new BankTransfer();
        $billingAddress  = new Address( [
            'street_name'     => 'TestStreet',
            'building_number' => '12',
            'town_name'       => 'Town',
            'post_code'       => '97405',
            'country'         => 'SK',
        ] );
        $shippingAddress = new Address( [
            'street_name'     => 'TestStreet',
            'building_number' => '12',
            'town_name'       => 'Town',
            'post_code'       => '97405',
            'country'         => 'SK',
        ] );
        $card_holder = 'Janko Hraško';

        $payLater = new PayLater( [
            'order' => new Order( [
                'order_no'    => $order_id,
                'order_items' => array(
                    new OrderItem([
                        'quantity' => 1.0,
                        'total_item_price' => $total,
                        'item_detail' => new ItemDetail([
                            'item_detail_sk' => new ItemDetailLangUnit([
                                'item_name' => 'test product1',
                            ]),
                        ]),
                    ])
                )
            ] ),
        ] );
        $cardDetail     = new CardDetail( [
            'card_holder'      => $card_holder,
            'billing_address'  => $billingAddress,
            'shipping_address' => $shippingAddress,
        ] );

        return new InitiatePaymentRequest( [
            'base_payment'  => $basePayment,
            'bank_transfer' => $bankTransfer,
            'user_data'     => $userData,
            'card_detail'   => $cardDetail,
            'pay_later'     => $payLater,
        ] );
    }

    public function testInitiatePaymentCheckPaymentStatus(): void
    {
        $accept_language = 'sk';
        $preferred_method = null;
        $initiate_payment_request = $this->getPaymentPayload(10, 'EUR');

        $api_instance  = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret,
        );

        $response = $api_instance->initiatePayment( 'http://localhost', $initiate_payment_request, $preferred_method, $accept_language );

        $this->assertFalse(is_null($response['object']));
        $this->assertFalse(is_null($response['response']));

        $payment_id = $response['object']->getPaymentId();
        $this->assertFalse(is_null($payment_id));

        $status = $api_instance->getPaymentIntentStatus($payment_id);

        $this->assertFalse(is_null($status['object']));
        $this->assertSame($status['response']->getStatusCode(), 200);
        $this->assertSame($status['object']->getAuthorizationStatus(), PaymentIntentStatusResponse::AUTHORIZATION_STATUS__NEW);
        $this->assertSame($status['object']->getSimpleStatus(), PaymentIntentStatusResponse::SIMPLE_STATUS_PENDING);
    }

    public function testCancelPaymentIntent(): void
    {
        $api_instance  = new TatraPayPlusAPIApi(
            $this->client_id,
            $this->client_secret,
        );
        $initiate_payment_request = $this->getPaymentPayload(10, 'EUR');

        $response = $api_instance->initiatePayment('http://localhost', $initiate_payment_request);

        $this->assertFalse(is_null($response['object']));
        $this->assertFalse(is_null($response['response']));

        $payment_id = $response['object']->getPaymentId();
        $this->assertFalse(is_null($payment_id));

        $response = $api_instance->cancelPaymentIntent($payment_id);
        $this->assertSame($response['response']->getStatusCode(), 200);
    }

    public function testUpdatePaymentIntent(): void
    {
        $mock_response = new HttpResponse(
            array(),
            array(),
            201
        );

        $mock_client = $this->getMockBuilder(CurlClient::class)->onlyMethods(['send',])->setConstructorArgs([null, false])->getMock();
        $mock_client->method('send')->will($this->returnValue($mock_response));

        $api_instance = $this->getMockBuilder(TatraPayPlusAPIApi::class)->onlyMethods(['addAuthHeader',])->setConstructorArgs([$this->client_id, $this->client_secret, $mock_client])->getMock();
        $api_instance->method('addAuthHeader')->will($this->returnCallback('mock_addAuthHeader'));

        $data = new CardPayUpdateInstruction( [
            'operation_type' =>CardPayUpdateInstruction::OPERATION_TYPE_CHARGEBACK,
            'amount'         => 3.0,
        ] );
        $response = $api_instance->updatePaymentIntent( 'TEST123', $data );

        $this->assertSame($response['response']->getStatusCode(), 201);
    }


}

function mock_addAuthHeader($headers)
{
    return $headers;
}
