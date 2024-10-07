<?php
/**
 * PaymentMethod
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class PaymentMethod
{
    /**
     * Possible values of this enum
     */
    public const BANK_TRANSFER = 'BANK_TRANSFER';

    public const CARD_PAY = 'CARD_PAY';

    public const PAY_LATER = 'PAY_LATER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::BANK_TRANSFER,
            self::CARD_PAY,
            self::PAY_LATER,
        ];
    }
}
