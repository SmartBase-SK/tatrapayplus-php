<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class TatraPayPlusService
{
    public const PRODUCTION = 0;
    public const SANDBOX = 1;

    public static function remove_diacritics($string)
    {
        $pattern = '/[^0-9a-zA-Z.@_ -]/';
        $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
        $cleaned_string = preg_replace($pattern, '', $string);

        return $cleaned_string;
    }

    public static function limit_length($string, $limit = 127)
    {
        if (function_exists('mb_strimwidth')) {
            if (mb_strlen($string) > $limit) {
                $string = mb_strimwidth($string, 0, $limit);
            }
        } else {
            if (strlen($string) > $limit) {
                $string = substr($string, 0, $limit);
            }
        }
	    $string = str_replace( array('&' , ';', '<', '>', '|', '`' ,'\\' ), ' ', $string);

        return $string === '' ? null : $string;
    }

    public static function retrieve_access_token_with_credentials($client, $client_id, $client_secret, $mode = self::SANDBOX, $scopes = 'TATRAPAYPLUS')
    {
        $config = Configuration::getDefaultConfiguration($mode);

        $apiInstance = new Api\TatraPayPlusAPIApi($config, $client);
        $grant_type = 'client_credentials';
        try {
            $response = $apiInstance->token($grant_type, $client_id, $client_secret, $scopes);
            $access_token = $response['object']->getAccessToken();
        } catch (Exception $e) {
            return null;
        }

        return $access_token;
    }

    public static function get_available_payment_methods($client, $access_token, $mode)
    {
        $config = Configuration::getDefaultConfiguration($mode)->setAccessToken($access_token);

        $apiInstance = new Api\TatraPayPlusAPIApi($config, $client);
        $result = $apiInstance->getMethods();
        $available_methods = $result['object'];
        $available_methods_currencies = [];
        foreach ($available_methods->getPaymentMethods() as $available_method) {
            if ($available_method->getAmountRangeRule()) {
                $amount_range_rule = [
                    'min_amount' => $available_method->getAmountRangeRule()->getMinAmount(),
                    'max_amount' => $available_method->getAmountRangeRule()->getMaxAmount(),
                ];
            } else {
                $amount_range_rule = null;
            }

            $available_methods_currencies[$available_method->getPaymentMethod()] = [
                'supported_currencies' => $available_method->getSupportedCurrency(),
                'amount_range_rule' => $amount_range_rule,
            ];
        }

        return $available_methods_currencies;
    }

    public static function is_currency_supported_for_specific_methods(
        $total_amount,
        $currency,
        $available_methods_currencies,
        $specific_methods
    ) {
        foreach ($specific_methods as $method) {
            if (array_key_exists($method, $available_methods_currencies)) {
                $method_currencies = $available_methods_currencies[$method]['supported_currencies'] ?? [];
                $amount_range = $available_methods_currencies[$method]['amount_range_rule'] ?? null;
                if (in_array($currency, $method_currencies)) {
                    if ($amount_range == null) {
                        return true;
                    } else {
                        return $amount_range['min_amount'] <= $total_amount and $total_amount <= $amount_range['max_amount'];
                    }
                }
            }
        }

        return false;
    }

    public static function get_icons_per_method()
    {
        $icons = [
            Model\PaymentMethod::CARD_PAY => [
                [
                    'id' => 'tatrapayplus',
                    'src' => 'tatrapayplus.svg',
                    'alt' => 'tatrapayplus',
                ],
                [
                    'id' => 'visa_tb',
                    'src' => 'visa_tb.png',
                    'alt' => 'visa',
                ],
                [
                    'id' => 'mastercard_tb',
                    'src' => 'mastercard_tb.svg',
                    'alt' => 'mastercard',
                ],
                [
                    'id' => 'apple-pay',
                    'src' => 'apple-pay-mark.svg',
                    'alt' => 'apple-pay',
                ],
                [
                    'id' => 'google-pay',
                    'src' => 'google-pay-mark.png',
                    'alt' => 'google-pay',
                ],
                [
                    'id' => 'click-to-pay',
                    'src' => 'click_to_pay.svg',
                    'alt' => 'click-to-pay',
                ],
            ],
            Model\PaymentMethod::BANK_TRANSFER => [
            ],
            Model\PaymentMethod::PAY_LATER => [
                [
                    'id' => 'paylater',
                    'src' => 'paylater.png',
                    'alt' => 'paylater',
                ],
            ],
        ];

        return $icons;
    }

    public static function get_all_icons()
    {
        $icons_per_method = static::get_icons_per_method();
        $all_icons = [];
        foreach ($icons_per_method as $method => $icons) {
            $all_icons = array_merge($all_icons, $icons);
        }

        return $all_icons;
    }

    public static function get_icons($currency, $total_amount, $available_methods_currencies)
    {
        $icons_per_method = static::get_icons_per_method();
        $all_icons = [];
        foreach ($icons_per_method as $method => $icons) {
            if (
                static::is_currency_supported_for_specific_methods(
                    $total_amount,
                    $currency,
                    $available_methods_currencies,
                    [$method]
                )
            ) {
                $all_icons = array_merge($all_icons, $icons);
            }
        }

        return $all_icons;
    }

    public static function check_payment_status($client, string $access_token, string $payment_id, $mode)
    {
        $config = Configuration::getDefaultConfiguration($mode)->setAccessToken($access_token);

        $apiInstance = new Api\TatraPayPlusAPIApi($config, $client);
        try {
            $result = $apiInstance->getPaymentIntentStatus($payment_id);
        } catch (Exception $e) {
            return null;
        }

        return $result;
    }

    public static function generate_signed_card_id_from_cid($cid, $public_key_content)
    {
        $publicKey = openssl_pkey_get_public($public_key_content);

        if (!$publicKey) {
            while ($error = openssl_error_string()) {
                error_log($error);
            }

            return null;
        }

        $encryptedData = '';
        if (!openssl_public_encrypt($cid, $encryptedData, $publicKey, OPENSSL_PKCS1_OAEP_PADDING)) {
            while ($error = openssl_error_string()) {
                error_log($error);
            }

            return null;
        }
        $signedData = wordwrap(base64_encode($encryptedData), 64, '\n', true);

        return $signedData;
    }
}
