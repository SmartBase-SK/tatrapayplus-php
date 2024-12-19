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
<<<<<<< HEAD
    public const QR_PAY = 'QR_PAY';
=======
>>>>>>> 6162d74a6789ce86edf9ade1d9ce6d193accfefe

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
<<<<<<< HEAD
            self::QR_PAY,
=======
>>>>>>> 6162d74a6789ce86edf9ade1d9ce6d193accfefe
        ];
    }
}
