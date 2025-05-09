<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class CurlClient
{
    public function send(Request $request): HttpResponse
    {
        $ch = curl_init($request->url);
        $headers = [];

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            $this->convert_headers_to_curl_format($request->headers)
        );
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (
            &$headers
        ) {
            $len = strlen($header);
            $header = explode(":", $header, 2);
            if (count($header) < 2) {
                // ignore invalid headers
                return $len;
            }

            $headers[strtolower(trim($header[0]))][] = trim($header[1]);

            return $len;
        });
        if ($request->method === "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->httpBody);
        } elseif ($request->method === "GET") {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        } elseif ($request->method === "DELETE") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        } elseif ($request->method === "PATCH") {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->httpBody);
        } else {
            exit("Unsupported request type");
        }

        $response = curl_exec($ch);

        if ($response === false) {
            $response = curl_error($ch);
        }
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return new HttpResponse($response, $headers, $http_status, $request);
    }

    public function convert_headers_to_curl_format(array $headers): array
    {
        $curlHeaders = [];

        foreach ($headers as $key => $value) {
            $curlHeaders[] = "{$key}: {$value}";
        }

        return $curlHeaders;
    }
}
