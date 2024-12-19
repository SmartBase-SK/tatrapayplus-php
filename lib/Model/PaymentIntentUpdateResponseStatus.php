<?php
/**
 * PaymentIntentUpdateResponseStatus
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class PaymentIntentUpdateResponseStatus implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'paymentIntentUpdateResponse_status';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'status' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatus',
        'currency' => 'string',
        'amount' => 'string',
        'pre_authorization' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount',
        'charge_back' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayAmount',
        'comfort_pay' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructureComfortPay',
        'masked_card_number' => 'string',
        'reason_code' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructureReasonCode',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     *
     * @phpstan-var array<string, string|null>
     *
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
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
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
    ];
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
    ];
    /**
     * If a nullable field gets set to null, insert it here
     *
     * @var bool[]
     */
    protected array $openAPINullablesSetToNull = [];
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
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
    }

    /**
     * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
     * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
     * $this->openAPINullablesSetToNull array
     *
     * @param string $variableName
     * @param array $fields
     * @param mixed $defaultValue
     */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     *
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
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
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     *
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return bool[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
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
        if (!preg_match('/[A-Z]{3}/', $this->container['currency'])) {
            $invalidProperties[] = "invalid value for 'currency', must be conform to the pattern /[A-Z]{3}/.";
        }

        if (!is_null($this->container['masked_card_number']) && (mb_strlen($this->container['masked_card_number']) > 19)) {
            $invalidProperties[] = "invalid value for 'masked_card_number', the character length must be smaller than or equal to 19.";
        }

        return $invalidProperties;
    }

    /**
     * Gets status
     *
     * @return CardPayStatus
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param CardPayStatus $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new SanitizedInvalidArgumentException('non-nullable status cannot be null');
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
     * @param string $currency ISO 4217 Alpha 3 currency code
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new SanitizedInvalidArgumentException('non-nullable currency cannot be null');
        }

        if (!preg_match('/[A-Z]{3}/', ObjectSerializer::toString($currency))) {
            throw new SanitizedInvalidArgumentException('invalid value for $currency when calling PaymentIntentUpdateResponseStatus., must conform to the pattern /[A-Z]{3}/.');
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
            throw new SanitizedInvalidArgumentException('non-nullable amount cannot be null');
        }

        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets pre_authorization
     *
     * @return CardPayAmount|null
     */
    public function getPreAuthorization()
    {
        return $this->container['pre_authorization'];
    }

    /**
     * Sets pre_authorization
     *
     * @param CardPayAmount|null $pre_authorization pre_authorization
     *
     * @return self
     */
    public function setPreAuthorization($pre_authorization)
    {
        if (is_null($pre_authorization)) {
            throw new SanitizedInvalidArgumentException('non-nullable pre_authorization cannot be null');
        }
        $this->container['pre_authorization'] = $pre_authorization;

        return $this;
    }

    /**
     * Gets charge_back
     *
     * @return CardPayAmount|null
     */
    public function getChargeBack()
    {
        return $this->container['charge_back'];
    }

    /**
     * Sets charge_back
     *
     * @param CardPayAmount|null $charge_back charge_back
     *
     * @return self
     */
    public function setChargeBack($charge_back)
    {
        if (is_null($charge_back)) {
            throw new SanitizedInvalidArgumentException('non-nullable charge_back cannot be null');
        }
        $this->container['charge_back'] = $charge_back;

        return $this;
    }

    /**
     * Gets comfort_pay
     *
     * @return CardPayStatusStructureComfortPay|null
     */
    public function getComfortPay()
    {
        return $this->container['comfort_pay'];
    }

    /**
     * Sets comfort_pay
     *
     * @param CardPayStatusStructureComfortPay|null $comfort_pay comfort_pay
     *
     * @return self
     */
    public function setComfortPay($comfort_pay)
    {
        if (is_null($comfort_pay)) {
            throw new SanitizedInvalidArgumentException('non-nullable comfort_pay cannot be null');
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
     * @param string|null $masked_card_number masked card number
     *
     * @return self
     */
    public function setMaskedCardNumber($masked_card_number)
    {
        if (is_null($masked_card_number)) {
            throw new SanitizedInvalidArgumentException('non-nullable masked_card_number cannot be null');
        }
        if (mb_strlen($masked_card_number) > 19) {
            throw new SanitizedInvalidArgumentException('invalid length for $masked_card_number when calling PaymentIntentUpdateResponseStatus., must be smaller than or equal to 19.');
        }

        $this->container['masked_card_number'] = $masked_card_number;

        return $this;
    }

    /**
     * Gets reason_code
     *
     * @return CardPayStatusStructureReasonCode|null
     */
    public function getReasonCode()
    {
        return $this->container['reason_code'];
    }

    /**
     * Sets reason_code
     *
     * @param CardPayStatusStructureReasonCode|null $reason_code reason_code
     *
     * @return self
     */
    public function setReasonCode($reason_code)
    {
        if (is_null($reason_code)) {
            throw new SanitizedInvalidArgumentException('non-nullable reason_code cannot be null');
        }
        $this->container['reason_code'] = $reason_code;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     *
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
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
     * @param mixed $value Value to be set
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
     * @param int $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param bool[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }
}
