<?php
/**
 * PayLaterStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class PayLaterStatus
{
    /**
     * Possible values of this enum
     */
    public const _NEW = 'NEW';

    public const CUSTOMER_CREATION_IN_PROGRESS = 'CUSTOMER_CREATION_IN_PROGRESS';

    public const LOAN_APPLICATION_IN_PROGRESS = 'LOAN_APPLICATION_IN_PROGRESS';

    public const LOAN_APPLICATION_FINISHED = 'LOAN_APPLICATION_FINISHED';

    public const LOAN_DISBURSED = 'LOAN_DISBURSED';

    public const CANCELED = 'CANCELED';

    public const EXPIRED = 'EXPIRED';
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
            self::_NEW,
            self::CUSTOMER_CREATION_IN_PROGRESS,
            self::LOAN_APPLICATION_IN_PROGRESS,
            self::LOAN_APPLICATION_FINISHED,
            self::LOAN_DISBURSED,
            self::CANCELED,
            self::EXPIRED,
        ];
    }

    public static function getAcceptedStatuses()
    {
        return [
            self::LOAN_DISBURSED,
        ];
    }

    public static function getRejectedStatuses()
    {
        return [
            self::CANCELED,
            self::EXPIRED,
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
