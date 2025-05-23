<?php
/**
 * PaymentIntentStatusResponseStatus
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
 * PaymentIntentStatusResponseStatus Class Doc Comment
 *
 * @category Class
 * @package  Tatrapayplus\TatrapayplusApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class PaymentIntentStatusResponseStatus implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'paymentIntentStatusResponse_status';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'status' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatus',
        'currency' => 'string',
        'amount' => 'float',
        'pre_authorization' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount',
        'charge_back' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount',
        'comfort_pay' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructureComfortPay',
        'masked_card_number' => 'string',
        'reason_code' => '\Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionDataReasonCode',
        'payment_authorization_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'status' => null,
        'currency' => null,
        'amount' => null,
        'pre_authorization' => null,
        'charge_back' => null,
        'comfort_pay' => null,
        'masked_card_number' => null,
        'reason_code' => null,
        'payment_authorization_code' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'status' => false,
        'currency' => false,
        'amount' => false,
        'pre_authorization' => false,
        'charge_back' => false,
        'comfort_pay' => false,
        'masked_card_number' => false,
        'reason_code' => false,
        'payment_authorization_code' => false
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
        'status' => 'status',
        'currency' => 'currency',
        'amount' => 'amount',
        'pre_authorization' => 'preAuthorization',
        'charge_back' => 'chargeBack',
        'comfort_pay' => 'comfortPay',
        'masked_card_number' => 'maskedCardNumber',
        'reason_code' => 'reasonCode',
        'payment_authorization_code' => 'paymentAuthorizationCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'status' => 'setStatus',
        'currency' => 'setCurrency',
        'amount' => 'setAmount',
        'pre_authorization' => 'setPreAuthorization',
        'charge_back' => 'setChargeBack',
        'comfort_pay' => 'setComfortPay',
        'masked_card_number' => 'setMaskedCardNumber',
        'reason_code' => 'setReasonCode',
        'payment_authorization_code' => 'setPaymentAuthorizationCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'status' => 'getStatus',
        'currency' => 'getCurrency',
        'amount' => 'getAmount',
        'pre_authorization' => 'getPreAuthorization',
        'charge_back' => 'getChargeBack',
        'comfort_pay' => 'getComfortPay',
        'masked_card_number' => 'getMaskedCardNumber',
        'reason_code' => 'getReasonCode',
        'payment_authorization_code' => 'getPaymentAuthorizationCode'
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
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('pre_authorization', $data ?? [], null);
        $this->setIfExists('charge_back', $data ?? [], null);
        $this->setIfExists('comfort_pay', $data ?? [], null);
        $this->setIfExists('masked_card_number', $data ?? [], null);
        $this->setIfExists('reason_code', $data ?? [], null);
        $this->setIfExists('payment_authorization_code', $data ?? [], null);
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

        if ($this->container['status'] === null) {
            $invalidProperties[] = "'status' can't be null";
        }
        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if (!preg_match("/[A-Z]{3}/", $this->container['currency'])) {
            $invalidProperties[] = "invalid value for 'currency', must be conform to the pattern /[A-Z]{3}/.";
        }

        if (!is_null($this->container['masked_card_number']) && (mb_strlen($this->container['masked_card_number']) > 19)) {
            $invalidProperties[] = "invalid value for 'masked_card_number', the character length must be smaller than or equal to 19.";
        }

        if (!is_null($this->container['payment_authorization_code']) && !preg_match("/^[ 0-9A-Z]{6}$/", $this->container['payment_authorization_code'])) {
            $invalidProperties[] = "invalid value for 'payment_authorization_code', must be conform to the pattern /^[ 0-9A-Z]{6}$/.";
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
     * Gets status
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatus $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency ISO 4217 Alpha 3 currency code.
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }

        if ((!preg_match("/[A-Z]{3}/", ObjectSerializer::toString($currency)))) {
            throw new \InvalidArgumentException("invalid value for \$currency when calling PaymentIntentStatusResponseStatus., must conform to the pattern /[A-Z]{3}/.");
        }

        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float|null $amount The amount given with fractional digits, where fractions must be compliant to the currency definition. Negative amounts are signed by minus. The decimal separator is a dot.  **Example:** Valid representations for EUR with up to two decimals are:    * 1056   * 5768.2   * -1.50   * 5877.78
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }


        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets pre_authorization
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount|null
     */
    public function getPreAuthorization()
    {
        return $this->container['pre_authorization'];
    }

    /**
     * Sets pre_authorization
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount|null $pre_authorization pre_authorization
     *
     * @return self
     */
    public function setPreAuthorization($pre_authorization)
    {
        if (is_null($pre_authorization)) {
            throw new \InvalidArgumentException('non-nullable pre_authorization cannot be null');
        }
        $this->container['pre_authorization'] = $pre_authorization;

        return $this;
    }

    /**
     * Gets charge_back
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount|null
     */
    public function getChargeBack()
    {
        return $this->container['charge_back'];
    }

    /**
     * Sets charge_back
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount|null $charge_back charge_back
     *
     * @return self
     */
    public function setChargeBack($charge_back)
    {
        if (is_null($charge_back)) {
            throw new \InvalidArgumentException('non-nullable charge_back cannot be null');
        }
        $this->container['charge_back'] = $charge_back;

        return $this;
    }

    /**
     * Gets comfort_pay
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructureComfortPay|null
     */
    public function getComfortPay()
    {
        return $this->container['comfort_pay'];
    }

    /**
     * Sets comfort_pay
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructureComfortPay|null $comfort_pay comfort_pay
     *
     * @return self
     */
    public function setComfortPay($comfort_pay)
    {
        if (is_null($comfort_pay)) {
            throw new \InvalidArgumentException('non-nullable comfort_pay cannot be null');
        }
        $this->container['comfort_pay'] = $comfort_pay;

        return $this;
    }

    /**
     * Gets masked_card_number
     *
     * @return string|null
     */
    public function getMaskedCardNumber()
    {
        return $this->container['masked_card_number'];
    }

    /**
     * Sets masked_card_number
     *
     * @param string|null $masked_card_number Masked card number.
     *
     * @return self
     */
    public function setMaskedCardNumber($masked_card_number)
    {
        if (is_null($masked_card_number)) {
            throw new \InvalidArgumentException('non-nullable masked_card_number cannot be null');
        }
        if ((mb_strlen($masked_card_number) > 19)) {
            throw new \InvalidArgumentException('invalid length for $masked_card_number when calling PaymentIntentStatusResponseStatus., must be smaller than or equal to 19.');
        }

        $this->container['masked_card_number'] = $masked_card_number;

        return $this;
    }

    /**
     * Gets reason_code
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionDataReasonCode|null
     */
    public function getReasonCode()
    {
        return $this->container['reason_code'];
    }

    /**
     * Sets reason_code
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionDataReasonCode|null $reason_code reason_code
     *
     * @return self
     */
    public function setReasonCode($reason_code)
    {
        if (is_null($reason_code)) {
            throw new \InvalidArgumentException('non-nullable reason_code cannot be null');
        }
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Gets payment_authorization_code
     *
     * @return string|null
     */
    public function getPaymentAuthorizationCode()
    {
        return $this->container['payment_authorization_code'];
    }

    /**
     * Sets payment_authorization_code
     *
     * @param string|null $payment_authorization_code Payment authorization code
     *
     * @return self
     */
    public function setPaymentAuthorizationCode($payment_authorization_code)
    {
        if (is_null($payment_authorization_code)) {
            throw new \InvalidArgumentException('non-nullable payment_authorization_code cannot be null');
        }

        if ((!preg_match("/^[ 0-9A-Z]{6}$/", ObjectSerializer::toString($payment_authorization_code)))) {
            throw new \InvalidArgumentException("invalid value for \$payment_authorization_code when calling PaymentIntentStatusResponseStatus., must conform to the pattern /^[ 0-9A-Z]{6}$/.");
        }

        $this->container['payment_authorization_code'] = $payment_authorization_code;

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


