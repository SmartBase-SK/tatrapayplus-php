<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class HttpResponse
{
    private $body;
    private $headers;
    private $statusCode;
    private $request;

    public function __construct($body, $headers, $statusCode, $request = null)
    {
        $this->body = $body;
        $this->headers = $headers;
        $this->statusCode = $statusCode;
        $this->request = $request;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
