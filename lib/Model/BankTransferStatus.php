<?php
/**
 * BankTransferStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class BankTransferStatus
{
    /**
     * Possible values of this enum
     */
    public const ACCC = 'ACCC';

    public const ACCP = 'ACCP';

    public const ACSC = 'ACSC';

    public const ACSP = 'ACSP';

    public const ACTC = 'ACTC';

    public const ACWC = 'ACWC';

    public const ACWP = 'ACWP';

    public const RCVD = 'RCVD';

    public const PDNG = 'PDNG';

    public const RJCT = 'RJCT';

    public const CANC = 'CANC';

    public const ACFC = 'ACFC';

    public const PATC = 'PATC';

    public const PART = 'PART';
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACCC,
            self::ACCP,
            self::ACSC,
            self::ACSP,
            self::ACTC,
            self::ACWC,
            self::ACWP,
            self::RCVD,
            self::PDNG,
            self::RJCT,
            self::CANC,
            self::ACFC,
            self::PATC,
            self::PART,
        ];
    }

    public static function getAcceptedStatuses()
    {
        return [
            self::ACSC,
            self::ACCC,
        ];
    }

    public static function getRejectedStatuses()
    {
        return [
            self::CANC,
            self::RJCT,
        ];
    }

    public function getStatus()
    {
        return $this->container['status'];
    }

    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new SanitizedInvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }
}
