<?php
/**
 * CardPayStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class CardPayStatus
{
    /**
     * Possible values of this enum
     */
    public const OK = 'OK';

    public const FAIL = 'FAIL';

    public const PA = 'PA';

    public const CPA = 'CPA';

    public const SPA = 'SPA';

    public const XPA = 'XPA';

    public const CB = 'CB';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::OK,
            self::FAIL,
            self::PA,
            self::CPA,
            self::SPA,
            self::XPA,
            self::CB,
        ];
    }
}
