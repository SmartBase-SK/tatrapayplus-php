<?php
/**
 * AccessToken
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient;

class AccessToken
{
    private string $access_token;
    private int $expires_in;

    public function __construct(string $access_token, int $expires_in)
    {
        $this->access_token = $access_token;
        $this->expires_in = $expires_in + time();
    }

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    public function isExpired(): bool
    {
        return $this->expires_in < time();
    }
}
