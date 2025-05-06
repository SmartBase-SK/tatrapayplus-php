<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class TatraPayPlusLogger
{
    public bool $mask_sensitive_data;
    public array $mask_body_fields = ["client_id", "client_secret", "access_token"];
    public array $mask_header_fields = ["Authorization"];

    public function __construct($mask_sensitive_data = true)
    {
        $this->mask_sensitive_data = $mask_sensitive_data;
    }

    private function _mask_value($value, $max_chars = 5): string
    {
        if (!is_string($value) || strlen($value) < $max_chars * 2) {
            return str_repeat("*", strlen($value));
        }
        return substr($value, 0, $max_chars) . str_repeat("*", strlen($value) - $max_chars * 2)  . substr($value, -$max_chars);
    }

    private function _mask_header(array $header)
    {
        if (!$this->mask_sensitive_data) {
            return json_encode($header, JSON_PRETTY_PRINT);
        }

        $masked_headers = [];
        foreach ($header as $key => $value) {
            if (in_array($key, $this->mask_header_fields, true)) {
                $masked_headers[$key] = $this->_mask_value((string) $value);
            } else {
                $masked_headers[$key] = $value;
            }
        }
        return json_encode($masked_headers, JSON_PRETTY_PRINT);
    }

    private function _mask_body($body)
    {
        if (empty($body)) {
            return "No body";
        }

        if (!$this->mask_sensitive_data) {
            return $body;
        }

        if (is_string($body)) {
            try {
                $body = json_decode($body, true);
            } catch (\Exception $e) {}
        }

        if (is_string($body)) {
            $pairs = [];
            parse_str($body, $pairs);
            $masked_pairs = [];

            foreach ($pairs as $key => $value) {
                if (in_array($key, $this->mask_body_fields, true)) {
                    $masked_pairs[] = $key . '=' . $this->_mask_value((string) $value);
                } else {
                    print $value;
                    $masked_pairs[] = $key . '=' . $value;
                }
            }
            return implode("&", $masked_pairs);
        }

        if (is_array($body)) {
            foreach ($this->mask_body_fields as $key) {
                if (array_key_exists($key, $body)) {
                    $body[$key] = $this->_mask_value((string) $body[$key]);
                }
            }
            return json_encode($body, JSON_PRETTY_PRINT);
        }

        return (string) $body;
    }

    public function log(HttpResponse $response, $additional_data): void
    {
        $date = gmdate('Y-m-d H:i:s');

        $request = $response->getRequest();
        $request_data = $this->_mask_body($request->getBody());
        $headers = $this->_mask_header($request->getHeaders());

        $this->writeLine(sprintf('INFO [%s] [INFO] Request:', $date));
        $this->writeLine(sprintf('Method: %s', $request->getMethod()));
        $this->writeLine(sprintf('URL: %s', $request->getUri()));
        $this->writeLine('Headers:');
        $this->writeLine(print_r($headers, true));
        if ($request_data) {
            $this->writeLine('Body:');
            $this->writeLine((string) $request_data);
        }

        $this->writeLine(sprintf('INFO [%s] [INFO] Response (status code: %s):', $date, $response->getStatusCode()));

        $response_body = $response->getBody();
        if (is_array($response_body)) {
            $response_body = array_merge($response_body, $additional_data);
        }
        $response_body_masked = $this->_mask_body($response_body);

        $this->writeLine(print_r($response_body_masked, true));
    }

    public function writeLine(string $line): void
    {
        print $line . "\n";
//        throw new Exception('TatraPayPlusLogger subclass must implement write_line()');
    }
}
