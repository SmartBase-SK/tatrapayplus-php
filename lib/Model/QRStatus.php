<?php
/**
 * QRStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class QRStatus
{
	/**
	 * Possible values of this enum
	 */
	public const ACCC = 'ACCC';
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
			self::ACCC,
			self::EXPIRED,
		];
	}

	public static function getAcceptedStatuses()
	{
		return [
			self::ACCC,
		];
	}

	public static function getRejectedStatuses()
	{
		return [
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
			throw new InvalidArgumentException('non-nullable status cannot be null');
		}
		$this->container['status'] = $status;

		return $this;
	}
}
