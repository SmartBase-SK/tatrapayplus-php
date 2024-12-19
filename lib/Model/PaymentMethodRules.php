<?php
/**
 * PaymentMethodRules
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class PaymentMethodRules implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'paymentMethodRules';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'paymentMethod' => '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod',
        'amount_range_rule' => '\Tatrapayplus\TatrapayplusApiClient\Model\AmountRangeRule',
        'supported_currency' => 'string[]',
        'allowed_bank_providers' => '\Tatrapayplus\TatrapayplusApiClient\Model\Provider[]',
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
        'paymentMethod' => null,
        'amount_range_rule' => null,
        'supported_currency' => null,
        'allowed_bank_providers' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'paymentMethod' => false,
        'amount_range_rule' => false,
        'supported_currency' => false,
        'allowed_bank_providers' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'paymentMethod' => 'paymentMethod',
        'amount_range_rule' => 'amountRangeRule',
        'supported_currency' => 'supportedCurrency',
        'allowed_bank_providers' => 'allowedBankProviders',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'paymentMethod' => 'setPaymentMethod',
        'amount_range_rule' => 'setAmountRangeRule',
        'supported_currency' => 'setSupportedCurrency',
        'allowed_bank_providers' => 'setAllowedBankProviders',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'paymentMethod' => 'getPaymentMethod',
        'amount_range_rule' => 'getAmountRangeRule',
        'supported_currency' => 'getSupportedCurrency',
        'allowed_bank_providers' => 'getAllowedBankProviders',
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
        $this->setIfExists('paymentMethod', $data ?? [], null);
        $this->setIfExists('amount_range_rule', $data ?? [], null);
        $this->setIfExists('supported_currency', $data ?? [], null);
        $this->setIfExists('allowed_bank_providers', $data ?? [], null);
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

        if ($this->container['paymentMethod'] === null) {
            $invalidProperties[] = "'paymentMethod' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Gets paymentMethod
     *
     * @return PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->container['paymentMethod'];
    }

    /**
     * Sets paymentMethod
     *
     * @param PaymentMethod $paymentMethod paymentMethod
     *
     * @return self
     */
    public function setPaymentMethod($paymentMethod)
    {
        if (is_null($paymentMethod)) {
            throw new SanitizedInvalidArgumentException('non-nullable paymentMethod cannot be null');
        }
        $this->container['paymentMethod'] = $paymentMethod;

        return $this;
    }

    /**
     * Gets amount_range_rule
     *
     * @return AmountRangeRule|null
     */
    public function getAmountRangeRule()
    {
        return $this->container['amount_range_rule'];
    }

    /**
     * Sets amount_range_rule
     *
     * @param AmountRangeRule|null $amount_range_rule amount_range_rule
     *
     * @return self
     */
    public function setAmountRangeRule($amount_range_rule)
    {
        if (is_null($amount_range_rule)) {
            throw new SanitizedInvalidArgumentException('non-nullable amount_range_rule cannot be null');
        }
        $this->container['amount_range_rule'] = $amount_range_rule;

        return $this;
    }

    /**
     * Gets supported_currency
     *
     * @return string[]|null
     */
    public function getSupportedCurrency()
    {
        return $this->container['supported_currency'];
    }

    /**
     * Sets supported_currency
     *
     * @param string[]|null $supported_currency supported_currency
     *
     * @return self
     */
    public function setSupportedCurrency($supported_currency)
    {
        if (is_null($supported_currency)) {
            throw new SanitizedInvalidArgumentException('non-nullable supported_currency cannot be null');
        }
        $this->container['supported_currency'] = $supported_currency;

        return $this;
    }

    /**
     * Gets allowed_bank_providers
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\Provider[]|null
     */
    public function getAllowedBankProviders()
    {
        return $this->container['allowed_bank_providers'];
    }

    /**
     * Sets allowed_bank_providers
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\Provider[]|null $allowed_bank_providers Allowed bank providers for BANK_TRNASFER method selected by TatraPayPlus client
     *
     * @return self
     */
    public function setAllowedBankProviders($allowed_bank_providers)
    {
        if (is_null($allowed_bank_providers)) {
            throw new SanitizedInvalidArgumentException('non-nullable allowed_bank_providers cannot be null');
        }
        $this->container['allowed_bank_providers'] = $allowed_bank_providers;

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
