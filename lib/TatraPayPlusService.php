<?php

namespace Tatrapayplus\TatrapayplusApiClient;

use Tatrapayplus\TatrapayplusApiClient\Model\BankTransferStatus;
use Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatus;
use Tatrapayplus\TatrapayplusApiClient\Model\InitiateDirectTransactionRequest;
use Tatrapayplus\TatrapayplusApiClient\Model\PayLaterStatus;
use Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod;
use Tatrapayplus\TatrapayplusApiClient\Model\QRStatus;

class TatraPayPlusService
{
    public const SIMPLE_STATUS_CAPTURE = 'CAPTURE';
    public const SIMPLE_STATUS_AUTHORIZED = 'AUTHORIZED';
    public const SIMPLE_STATUS_PENDING = 'PENDING';
    public const SIMPLE_STATUS_REJECTED = 'REJECTED';

    public const SIMPLE_STATUS_MAP = array(
        PaymentMethod::PAY_LATER => array(
            self::SIMPLE_STATUS_CAPTURE => [PayLaterStatus::LOAN_APPLICATION_FINISHED, PayLaterStatus::LOAN_DISBURSED],
            self::SIMPLE_STATUS_REJECTED => [PayLaterStatus::CANCELED, PayLaterStatus::EXPIRED],
        ),
        PaymentMethod::CARD_PAY => array(
            self::SIMPLE_STATUS_CAPTURE => [CardPayStatus::OK, CardPayStatus::CB],
            self::SIMPLE_STATUS_REJECTED => [CardPayStatus::FAIL],
            self::SIMPLE_STATUS_AUTHORIZED => [CardPayStatus::PA],
        ),
        PaymentMethod::BANK_TRANSFER => array(
            self::SIMPLE_STATUS_CAPTURE => [BankTransferStatus::ACCC, BankTransferStatus::ACSC],
            self::SIMPLE_STATUS_REJECTED => [BankTransferStatus::CANC, BankTransferStatus::RJCT],
        ),
        PaymentMethod::QR_PAY => array(
            self::SIMPLE_STATUS_CAPTURE => [QRStatus::ACCC],
            self::SIMPLE_STATUS_REJECTED => [QRStatus::EXPIRED],
        ),
        PaymentMethod::DIRECT_API => array(
            self::SIMPLE_STATUS_CAPTURE => [CardPayStatus::OK, CardPayStatus::CB],
            self::SIMPLE_STATUS_REJECTED => [CardPayStatus::FAIL],
        ),
    );

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
        $string = str_replace(array('&', ';', '<', '>', '|', '`', '\\'), ' ', $string);

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

    public static function map_simple_status($status_response)
    {
        $status_to_return = self::SIMPLE_STATUS_PENDING;

        $status_response_object = $status_response['object'];
        $selected_method = $status_response_object->getSelectedPaymentMethod();
        $status_to_map = $status_response_object->getStatus();

        if (!array_key_exists($selected_method, self::SIMPLE_STATUS_MAP) || is_null($status_to_map)) {
            return $status_to_return;
        }

        if (!is_string($status_to_map)) {
            $status_to_map = $status_to_map->getStatus();
        }

        foreach (self::SIMPLE_STATUS_MAP[$selected_method] as $simple_status => $gateway_statuses) {
            if (in_array($status_to_map, $gateway_statuses)) {
                $status_to_return = $simple_status;
                break;
            }
        }
        return $status_to_return;
    }

    public static function remove_card_holder_diacritics($initiate_payment_request)
    {
        if ($initiate_payment_request instanceof InitiateDirectTransactionRequest) {
            $card_detail = $initiate_payment_request->getTdsData();
            $card_detail->setCardHolder(self::remove_diacritics($card_detail->getCardHolder()));
        } else {
            $card_detail = $initiate_payment_request->getCardDetail();
            $card_detail->setCardHolder(self::remove_diacritics($card_detail->getCardHolder()));
        }

        return $initiate_payment_request;
    }
}
