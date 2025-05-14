<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class Request
{
    public $method;
    public $url;
    public $headers;
    public $httpBody;

    public function __construct($method, $url, $headers, $httpBody = null)
    {
        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->httpBody = $httpBody;
    }

    public function getUri()
    {
        return $this->url;
    }

    public function __toString()
    {
        // Mask Authorization header
        $headersString = '';
        foreach ($this->headers as $key => $value) {
            if (strtolower($key) === 'authorization') {
                $value = '***';
            }
            $headersString .= "$key: $value\n";
        }

        // Mask client_secret in body (keep first 5 and last 5 characters)
        $httpBodyString = 'No body';
        if (!empty($this->httpBody)) {
            $httpBodyString = preg_replace_callback(
                '/(client_secret=)([^&]+)/',
                function ($matches) {
                    $secret = $matches[2];
                    if (strlen($secret) <= 10) {
                        return $matches[1] . str_repeat('*', strlen($secret));
                    }
                    return $matches[1]
                           . substr($secret, 0, 5)
                           . str_repeat('*', strlen($secret) - 10)
                           . substr($secret, -5);
                },
                $this->httpBody
            );
        }

        return sprintf(
            "Request:\nMethod: %s\nURL: %s\nHeaders:\n%sBody:\n%s",
            $this->method,
            $this->url,
            $headersString,
            $httpBodyString
        );
    }
}
