<?php
/**
 * ComfortPayStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class ComfortPayStatus
{
    /**
     * Possible values of this enum
     */
    public const OK = 'OK';

    public const FAIL = 'FAIL';

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
        ];
    }
}
