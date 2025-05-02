<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class TatraPayPlusService
{
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

    public static function get_icons_per_method()
    {
        $icons = [
            Model\PaymentMethod::CARD_PAY => [
                [
                    'id' => 'tatrapayplus',
                    'src' => 'tatrapayplus.png',
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
            Model\PaymentMethod::QR_PAY => [
	            [
		            'id' => 'qr',
		            'src' => 'qr.svg',
		            'alt' => 'qr',
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
