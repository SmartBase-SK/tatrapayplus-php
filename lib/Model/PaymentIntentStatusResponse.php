<?php
/**
 * PaymentIntentStatusResponse
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  Tatrapayplus\TatrapayplusApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * TatraPayPlus API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 0.0.1_2024-05-27v1
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use \ArrayAccess;
use \Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

/**
 * PaymentIntentStatusResponse Class Doc Comment
 *
 * @category Class
 * @description **TatraPayPlus status response. For each payment method will be sent specific status structure**  | selectedPaymentMethod      | status structure | description| | ---------------- | ------------| ------------| | BANK_TRANSFER              | bankTransferStatus     || | QR_PAY                   | bankTransferStatus     | Only ACCC is provided. Status will be provided as soon as amount is in target account | | CARD_PAY              | cardPayStatusStructure || | PAY_LATER               | payLaterStatus || | DIRECT_API               | cardPayStatusStructure ||
 * @package  Tatrapayplus\TatrapayplusApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentIntentStatusResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'paymentIntentStatusResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'selected_payment_method' => '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod',
        'authorization_status' => 'string',
        'status' => 'mixed'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'selected_payment_method' => null,
        'authorization_status' => null,
        'status' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'selected_payment_method' => false,
        'authorization_status' => false,
        'status' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'selected_payment_method' => 'selectedPaymentMethod',
        'authorization_status' => 'authorizationStatus',
        'status' => 'status'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'selected_payment_method' => 'setSelectedPaymentMethod',
        'authorization_status' => 'setAuthorizationStatus',
        'status' => 'setStatus'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'selected_payment_method' => 'getSelectedPaymentMethod',
        'authorization_status' => 'getAuthorizationStatus',
        'status' => 'getStatus'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    public const AUTHORIZATION_STATUS__NEW = 'NEW';
    public const AUTHORIZATION_STATUS_PAY_METHOD_SELECTED = 'PAY_METHOD_SELECTED';
    public const AUTHORIZATION_STATUS_AUTH_DONE = 'AUTH_DONE';
    public const AUTHORIZATION_STATUS_AUTH_FAILED = 'AUTH_FAILED';
    public const AUTHORIZATION_STATUS_EXPIRED = 'EXPIRED';
    public const AUTHORIZATION_STATUS_CANCELLED_BY_TPP = 'CANCELLED_BY_TPP';
    public const AUTHORIZATION_STATUS_CANCELLED_BY_USER = 'CANCELLED_BY_USER';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAuthorizationStatusAllowableValues()
    {
        return [
            self::AUTHORIZATION_STATUS__NEW,
            self::AUTHORIZATION_STATUS_PAY_METHOD_SELECTED,
            self::AUTHORIZATION_STATUS_AUTH_DONE,
            self::AUTHORIZATION_STATUS_AUTH_FAILED,
            self::AUTHORIZATION_STATUS_EXPIRED,
            self::AUTHORIZATION_STATUS_CANCELLED_BY_TPP,
            self::AUTHORIZATION_STATUS_CANCELLED_BY_USER,
        ];
    }

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('selected_payment_method', $data ?? [], null);
        $this->setIfExists('authorization_status', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['authorization_status'] === null) {
            $invalidProperties[] = "'authorization_status' can't be null";
        }
        $allowedValues = $this->getAuthorizationStatusAllowableValues();
        if (!is_null($this->container['authorization_status']) && !in_array($this->container['authorization_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'authorization_status', must be one of '%s'",
                $this->container['authorization_status'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets selected_payment_method
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod|null
     */
    public function getSelectedPaymentMethod()
    {
        return $this->container['selected_payment_method'];
    }

    /**
     * Sets selected_payment_method
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod|null $selected_payment_method selected_payment_method
     *
     * @return self
     */
    public function setSelectedPaymentMethod($selected_payment_method)
    {
        if (is_null($selected_payment_method)) {
            throw new \InvalidArgumentException('non-nullable selected_payment_method cannot be null');
        }
        $this->container['selected_payment_method'] = $selected_payment_method;

        return $this;
    }

    /**
     * Gets authorization_status
     *
     * @return string
     */
    public function getAuthorizationStatus()
    {
        return $this->container['authorization_status'];
    }

    /**
     * Sets authorization_status
     *
     * @param string $authorization_status Status of payment intent authorization progress. Be aware, It doesnt indicate payment status! To get payment status see attribute status.
     *
     * @return self
     */
    public function setAuthorizationStatus($authorization_status)
    {
        if (is_null($authorization_status)) {
            throw new \InvalidArgumentException('non-nullable authorization_status cannot be null');
        }
        $allowedValues = $this->getAuthorizationStatusAllowableValues();
        if (!in_array($authorization_status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'authorization_status', must be one of '%s'",
                    $authorization_status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['authorization_status'] = $authorization_status;

        return $this;
    }

    /**
     * Gets status
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponseStatus|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\PaymentIntentStatusResponseStatus|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        if ($this->getSelectedPaymentMethod() == PaymentMethod::CARD_PAY || $this->getSelectedPaymentMethod() == PaymentMethod::DIRECT_API) {
            $type = '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructure';
            $value = ObjectSerializer::deserialize($status, $type, null);
        } elseif (is_string($status)) {
            $value = $status;
        } else {
            throw new \InvalidArgumentException('invalid status value: ' . $status);
        }
        $this->container['status'] = $value;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


