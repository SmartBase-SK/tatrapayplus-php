<?php
/**
 * Status
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class Status
{
    /**
     * Possible values of this enum
     */
    public const OFFER = 'OFFER';

    public const NO_OFFER = 'NO_OFFER';

    public const OPEN = 'OPEN';

    public const PROCESSING = 'PROCESSING';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::OFFER,
            self::NO_OFFER,
            self::OPEN,
            self::PROCESSING,
        ];
    }
}
