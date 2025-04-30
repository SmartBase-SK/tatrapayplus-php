<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Tatrapayplus\TatrapayplusApiClient\Model\InitiatePaymentRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponse;
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
use Tatrapayplus\TatrapayplusApiClient\MagentoCurlClient;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;
use Tatrapayplus\TatrapayplusApiClient\api\TatraPayPlusAPIApi;


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

    public function testRetrieveAccessToken(): void
    {
        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            $this->client_id,
            $this->client_secret,
        );

        $this->assertTrue(is_string($access_token));
    }

    public function testGetAvailablePaymentMethods(): void
    {
        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            $this->client_id,
            $this->client_secret,
        );
        $this->assertTrue(is_string($access_token));

        $available_methods = TatraPayPlusService::get_available_payment_methods(
            $client,
            $access_token,
            TatraPayPlusService::SANDBOX,
        );

        $this->assertTrue(is_array($available_methods));
        $this->assertSame($available_methods['CARD_PAY']['supported_currencies'], ['EUR', 'USD']);
    }

    public function testIsCurrencySupportedForSpecificMethod(): void
    {
        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            $this->client_id,
            $this->client_secret,
        );
        $this->assertTrue(is_string($access_token));

        $available_methods = TatraPayPlusService::get_available_payment_methods(
            $client,
            $access_token,
            TatraPayPlusService::SANDBOX,
        );
        $this->assertTrue(is_array($available_methods));

        $test_cases = array(
            // amount, currency, requested_methods, expected_result
            array(10000, 'EUR', ['CARD_PAY'], true),
            array(10, 'USD', ['QR_PAY'], false),
        );

        foreach ($test_cases as [$amount, $currency, $requested_methods, $expected_result]) {
            $is_available = TatraPayPlusService::is_currency_supported_for_specific_methods(
                $amount,
                $currency,
                $available_methods,
                $requested_methods
            );
            $this->assertSame($is_available, $expected_result);
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
        $card_holder = 'Janko Hrasko';

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
        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            $this->client_id,
            $this->client_secret,
        );
        $config = Configuration::getDefaultConfiguration( TatraPayPlusService::SANDBOX )->setAccessToken( $access_token );
        $apiInstance = new TatraPayPlusAPIApi( $config, $client );
        $accept_language = 'sk';
        $preferred_method = null;

        $initiate_payment_request = $this->getPaymentPayload(10, 'EUR');

        $response = $apiInstance->initiatePayment( 'http://localhost', $initiate_payment_request, $preferred_method, $accept_language );

        $this->assertFalse(is_null($response['object']));
        $this->assertFalse(is_null($response['response']));

        $payment_id = $response['object']->getPaymentId();
        $this->assertFalse(is_null($payment_id));

        $status = TatraPayPlusService::check_payment_status(
            $client,
            (string)$access_token,
            $payment_id,
            TatraPayPlusService::SANDBOX
        );

        $this->assertFalse(is_null($status['object']));
        $this->assertSame($status['response']->getStatusCode(), 200);
        $this->assertSame($status['object']->getAuthorizationStatus(), PaymentIntentStatusResponse::AUTHORIZATION_STATUS__NEW);
    }
}