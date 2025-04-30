<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Tatrapayplus\TatrapayplusApiClient\MagentoCurlClient;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;


final class Tests extends TestCase
{
    private function getApiCredentials()
    {
        $client_id = getenv('TATRAPAY_CLIENT_ID');
        $client_secret = getenv('TATRAPAY_CLIENT_SECRET');

        return [$client_id, $client_secret];
    }

    public function testRetrieveAccessToken(): void
    {
        [$client_id, $client_secret] = $this->getApiCredentials();

        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            $client_id,
            $client_secret,
        );

        $this->assertTrue(is_string($access_token));
    }

    public function testLimitLength(): void
    {
        $result = TatraPayPlusService::limit_length('test123', 4);
        $this->assertSame($result, 'test');
    }
}