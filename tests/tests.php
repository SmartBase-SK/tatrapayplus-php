<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

use Tatrapayplus\TatrapayplusApiClient\MagentoCurlClient;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;


final class Tests extends TestCase
{
    public function testRetrieveAccessToken(): void
    {
        $client = new MagentoCurlClient(null, null);
        $access_token = TatraPayPlusService::retrieve_access_token_with_credentials(
            $client,
            'client_id',
            'client_secret',
        );

        $this->assertTrue(is_string($access_token));
    }

    public function testLimitLength(): void
    {
        $result = TatraPayPlusService::limit_length('asdqwe', 3);
        $this->assertSame($result, 'asd');
    }
}