<?php

namespace Tatrapayplus\TatrapayplusApiClient;

class TatraPayPlusService
{
    public const PRODUCTION = 0;
    public const SANDBOX = 1;

    /**
     * Transliteration map for non-Latin scripts (no ICU — same behaviour on WordPress, PrestaShop, OpenCart, etc.).
     */
    private static array $transliterationMap = [
        // Greek
        'Α'=>'A','α'=>'a','Β'=>'B','β'=>'b','Γ'=>'G','γ'=>'g','Δ'=>'D','δ'=>'d',
        'Ε'=>'E','ε'=>'e','Ζ'=>'Z','ζ'=>'z','Η'=>'E','η'=>'e','Θ'=>'Th','θ'=>'th',
        'Ι'=>'I','ι'=>'i','Κ'=>'K','κ'=>'k','Λ'=>'L','λ'=>'l','Μ'=>'M','μ'=>'m',
        'Ν'=>'N','ν'=>'n','Ξ'=>'X','ξ'=>'x','Ο'=>'O','ο'=>'o','Π'=>'P','π'=>'p',
        'Ρ'=>'R','ρ'=>'r','Σ'=>'S','σ'=>'s','ς'=>'s','Τ'=>'T','τ'=>'t','Υ'=>'Y','υ'=>'y',
        'Φ'=>'Ph','φ'=>'ph','Χ'=>'Ch','χ'=>'ch','Ψ'=>'Ps','ψ'=>'ps','Ω'=>'O','ω'=>'o',

        // Arabic (basic mapping for common names)
        'ا'=>'a','ب'=>'b','ت'=>'t','ث'=>'th','ج'=>'j','ح'=>'h','خ'=>'kh','د'=>'d',
        'ذ'=>'dh','ر'=>'r','ز'=>'z','س'=>'s','ش'=>'sh','ص'=>'s','ض'=>'d','ط'=>'t',
        'ظ'=>'z','ع'=>'a','غ'=>'gh','ف'=>'f','ق'=>'q','ك'=>'k','ل'=>'l','م'=>'m',
        'ن'=>'n','ه'=>'h','و'=>'w','ي'=>'y','ء'=>'','آ'=>'a','أ'=>'a','إ'=>'i',
        'ى'=>'a','ة'=>'h',

        // Hebrew
        'א'=>'','ב'=>'b','ג'=>'g','ד'=>'d','ה'=>'h','ו'=>'v','ז'=>'z','ח'=>'ch',
        'ט'=>'t','י'=>'y','כ'=>'k','ך'=>'k','ל'=>'l','מ'=>'m','ם'=>'m','נ'=>'n',
        'ן'=>'n','ס'=>'s','ע'=>'','פ'=>'p','ף'=>'p','צ'=>'ts','ץ'=>'ts','ק'=>'k',
        'ר'=>'r','ש'=>'sh','ת'=>'t',

        // Cyrillic
        'А'=>'A','а'=>'a','Б'=>'B','б'=>'b','В'=>'V','в'=>'v','Г'=>'G','г'=>'g',
        'Д'=>'D','д'=>'d','Е'=>'E','е'=>'e','Ё'=>'E','ё'=>'e','Ж'=>'Z','ж'=>'z',
        'З'=>'Z','з'=>'z','И'=>'I','и'=>'i','Й'=>'J','й'=>'j','К'=>'K','к'=>'k',
        'Л'=>'L','л'=>'l','М'=>'M','м'=>'m','Н'=>'N','н'=>'n','О'=>'O','о'=>'o',
        'П'=>'P','п'=>'p','Р'=>'R','р'=>'r','С'=>'S','с'=>'s','Т'=>'T','т'=>'t',
        'У'=>'U','у'=>'u','Ф'=>'F','ф'=>'f','Х'=>'H','х'=>'h','Ц'=>'C','ц'=>'c',
        'Ч'=>'Ch','ч'=>'ch','Ш'=>'Sh','ш'=>'sh','Щ'=>'Sch','щ'=>'sch','Ъ'=>'','ъ'=>'',
        'Ы'=>'Y','ы'=>'y','Ь'=>'','ь'=>'','Э'=>'E','э'=>'e','Ю'=>'Yu','ю'=>'yu',
        'Я'=>'Ya','я'=>'ya',

        // Ukrainian
        'Є'=>'Ye','є'=>'ye','І'=>'I','і'=>'i','Ї'=>'Yi','ї'=>'yi','Ґ'=>'G','ґ'=>'g',

        // Belarusian
        'Ў'=>'U','ў'=>'u',

        // Serbian / Macedonian extras
        'Ђ'=>'Dj','ђ'=>'dj','Љ'=>'Lj','љ'=>'lj','Њ'=>'Nj','њ'=>'nj','Ћ'=>'C','ћ'=>'c',
        'Џ'=>'Dz','џ'=>'dz',
    ];

    /**
     * Latin letters with diacritics → ASCII base (EU + common extended Latin). Used after script map; avoids ICU / libc differences.
     */
    private static array $latinAccentFoldMap = [
        'À'=>'A','Á'=>'A','Â'=>'A','Ã'=>'A','Ä'=>'A','Å'=>'A','Ā'=>'A','Ă'=>'A','Ą'=>'A',
        'à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'a','å'=>'a','ā'=>'a','ă'=>'a','ą'=>'a',
        'Ç'=>'C','ç'=>'c','Ć'=>'C','ć'=>'c','Č'=>'C','č'=>'c',
        'Ð'=>'D','ð'=>'d','Ď'=>'D','ď'=>'d','Đ'=>'D','đ'=>'d',
        'È'=>'E','É'=>'E','Ê'=>'E','Ë'=>'E','Ē'=>'E','Ĕ'=>'E','Ė'=>'E','Ę'=>'E','Ě'=>'E',
        'è'=>'e','é'=>'e','ê'=>'e','ë'=>'e','ē'=>'e','ĕ'=>'e','ė'=>'e','ę'=>'e','ě'=>'e',
        'Ĝ'=>'G','Ğ'=>'G','Ġ'=>'G','Ģ'=>'G','ĝ'=>'g','ğ'=>'g','ġ'=>'g','ģ'=>'g',
        'Ĥ'=>'H','Ħ'=>'H','ĥ'=>'h','ħ'=>'h',
        'Ì'=>'I','Í'=>'I','Î'=>'I','Ï'=>'I','Ĩ'=>'I','Ī'=>'I','Ĭ'=>'I','Į'=>'I','İ'=>'I',
        'ì'=>'i','í'=>'i','î'=>'i','ï'=>'i','ĩ'=>'i','ī'=>'i','į'=>'i','ı'=>'i',
        'Ĵ'=>'J','ĵ'=>'j',
        'Ķ'=>'K','ķ'=>'k','ĸ'=>'k',
        'Ĺ'=>'L','Ļ'=>'L','Ľ'=>'L','Ŀ'=>'L','Ł'=>'L','ĺ'=>'l','ļ'=>'l','ľ'=>'l','ŀ'=>'l','ł'=>'l',
        'Ñ'=>'N','Ń'=>'N','Ņ'=>'N','Ň'=>'N','Ŋ'=>'N','ñ'=>'n','ń'=>'n','ņ'=>'n','ň'=>'n','ŋ'=>'n',
        'Ò'=>'O','Ó'=>'O','Ô'=>'O','Õ'=>'O','Ö'=>'O','Ø'=>'O','Ō'=>'O','Ŏ'=>'O','Ő'=>'O',
        'ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ø'=>'o','ō'=>'o','ŏ'=>'o','ő'=>'o',
        'Œ'=>'Oe','œ'=>'oe',
        'Þ'=>'Th','þ'=>'th',
        'Ŕ'=>'R','Ŗ'=>'R','Ř'=>'R','ŕ'=>'r','ŗ'=>'r','ř'=>'r',
        'ß'=>'ss',
        'Ś'=>'S','Ş'=>'S','Š'=>'S','ś'=>'s','ş'=>'s','š'=>'s','Ș'=>'S','ș'=>'s',
        'Ţ'=>'T','Ť'=>'T','Ŧ'=>'T','ţ'=>'t','ť'=>'t','ŧ'=>'t','Ț'=>'T','ț'=>'t',
        'Ù'=>'U','Ú'=>'U','Û'=>'U','Ü'=>'U','Ũ'=>'U','Ū'=>'U','Ŭ'=>'U','Ů'=>'U','Ű'=>'U','Ų'=>'U',
        'ù'=>'u','ú'=>'u','û'=>'u','ü'=>'u','ũ'=>'u','ū'=>'u','ŭ'=>'u','ů'=>'u','ű'=>'u','ų'=>'u',
        'Ý'=>'Y','Ÿ'=>'Y','Ŷ'=>'Y','ý'=>'y','ÿ'=>'y','ŷ'=>'y',
        'Ź'=>'Z','Ż'=>'Z','Ž'=>'Z','ź'=>'z','ż'=>'z','ž'=>'z',
        'Ơ'=>'O','ơ'=>'o','Ư'=>'U','ư'=>'u',
        'Ǎ'=>'A','ǎ'=>'a','Ǐ'=>'I','ǐ'=>'i','Ǒ'=>'O','ǒ'=>'o','Ǔ'=>'U','ǔ'=>'u',
        'Ǧ'=>'G','ǧ'=>'g','Ǩ'=>'K','ǩ'=>'k',
        'Ǳ'=>'Dz','ǲ'=>'Dz','ǳ'=>'dz',
        'Ǹ'=>'N','ǹ'=>'n',
        'Ȧ'=>'A','ȧ'=>'a','Ȯ'=>'O','ȯ'=>'o',
        'Ẁ'=>'W','ẁ'=>'w','Ẃ'=>'W','ẃ'=>'w','Ẅ'=>'W','ẅ'=>'w',
    ];

    public static function transliterate(string $string)
    {
        $string = strtr($string, self::$transliterationMap);

        $string = preg_replace('/[^\p{Latin}\p{N}\s\.\,\-\'\/@]/u', '', $string) ?? $string;

        // 4) Normalize whitespace
        $string = preg_replace('/\s+/u', ' ', $string) ?? $string;
        $string = trim($string);

        // 5) Fold Latin accents / supplements to ASCII (manual map first, then libc — no ICU).
        $string = self::foldLatinToAscii($string);

        return $string;
    }

    /**
     * Strip accents / Latin extensions to ASCII for payment APIs (no Transliterator — portable across hosts).
     */
    private static function foldLatinToAscii(string $string): string
    {
        if ($string === '') {
            return $string;
        }

        $string = strtr($string, self::$latinAccentFoldMap);

        $folded = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
        if ($folded !== false) {
            return trim($folded);
        }

        if (function_exists('normalizer_normalize')) {
            $nfd = normalizer_normalize($string, \Normalizer::FORM_D);
            if ($nfd !== false) {
                $stripped = preg_replace('/\p{Mn}/u', '', $nfd);
                if ($stripped !== null && $stripped !== '') {
                    return trim($stripped);
                }
            }
        }

        $clean = preg_replace('/[^\x20-\x7E]/u', '', $string);

        return trim($clean ?? $string);
    }

    public static function transliterate_and_limit_length(string $string, int $limit = 127)
    {
        $string = self::transliterate($string);

        return self::limit_length($string, $limit);
    }

    public static function remove_diacritics($string)
    {
        $pattern = '/[^0-9a-zA-Z.@_ -]/';
        $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
        $cleaned_string = preg_replace($pattern, '', $string);

        return $cleaned_string;
    }

    public static function limit_length($string, $limit = 127)
    {
        $encoding = 'UTF-8';
        if (function_exists('mb_strlen') && function_exists('mb_strimwidth')) {
            if (mb_strlen($string, $encoding) > $limit) {
                $string = mb_strimwidth($string, 0, $limit, '', $encoding);
            }
        } elseif (function_exists('mb_substr') && function_exists('mb_strlen')) {
            if (mb_strlen($string, $encoding) > $limit) {
                $string = mb_substr($string, 0, $limit, $encoding);
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
        } catch (\Exception $e) {
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
            if (is_array($available_methods_currencies) && array_key_exists($method, $available_methods_currencies)) {
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
        } catch (\Exception $e) {
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
