<?php
/**
 * AvailablePaymentMethod
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class AvailablePaymentMethod implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;
    public const REASON_CODE_METHOD_AVAILABILITY_NO_CONTRACT = 'NO_CONTRACT';
    public const REASON_CODE_METHOD_AVAILABILITY_NOT_FEASIBLE_CURRENCY = 'NOT_FEASIBLE_CURRENCY';
    public const REASON_CODE_METHOD_AVAILABILITY_OUT_OF_RANGE_AMOUNT = 'OUT_OF_RANGE_AMOUNT';
    public const REASON_CODE_METHOD_AVAILABILITY_MANDATORY_STRUCTURE_NOT_PROVIDED = 'MANDATORY_STRUCTURE_NOT_PROVIDED';
    public const REASON_CODE_METHOD_AVAILABILITY_UNSUPPORTED_BANK_PROVIDER = 'UNSUPPORTED_BANK_PROVIDER';
    public const REASON_CODE_METHOD_AVAILABILITY_INCORRECT_INPUT = 'INCORRECT_INPUT';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'availablePaymentMethod';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'payment_method' => '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod',
        'is_available' => 'bool',
        'reason_code_method_availability' => 'string',
        'reason_code_method_availability_description' => 'string',
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
        'payment_method' => null,
        'is_available' => null,
        'reason_code_method_availability' => null,
        'reason_code_method_availability_description' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'payment_method' => false,
        'is_available' => false,
        'reason_code_method_availability' => false,
        'reason_code_method_availability_description' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'payment_method' => 'paymentMethod',
        'is_available' => 'isAvailable',
        'reason_code_method_availability' => 'reasonCodeMethodAvailability',
        'reason_code_method_availability_description' => 'reasonCodeMethodAvailabilityDescription',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'payment_method' => 'setPaymentMethod',
        'is_available' => 'setIsAvailable',
        'reason_code_method_availability' => 'setReasonCodeMethodAvailability',
        'reason_code_method_availability_description' => 'setReasonCodeMethodAvailabilityDescription',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'payment_method' => 'getPaymentMethod',
        'is_available' => 'getIsAvailable',
        'reason_code_method_availability' => 'getReasonCodeMethodAvailability',
        'reason_code_method_availability_description' => 'getReasonCodeMethodAvailabilityDescription',
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
        $this->setIfExists('payment_method', $data ?? [], null);
        $this->setIfExists('is_available', $data ?? [], null);
        $this->setIfExists('reason_code_method_availability', $data ?? [], null);
        $this->setIfExists('reason_code_method_availability_description', $data ?? [], null);
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

        if ($this->container['payment_method'] === null) {
            $invalidProperties[] = "'payment_method' can't be null";
        }
        if ($this->container['is_available'] === null) {
            $invalidProperties[] = "'is_available' can't be null";
        }
        $allowedValues = $this->getReasonCodeMethodAvailabilityAllowableValues();
        if (!is_null($this->container['reason_code_method_availability']) && !in_array($this->container['reason_code_method_availability'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'reason_code_method_availability', must be one of '%s'",
                $this->container['reason_code_method_availability'],
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getReasonCodeMethodAvailabilityAllowableValues()
    {
        return [
            self::REASON_CODE_METHOD_AVAILABILITY_NO_CONTRACT,
            self::REASON_CODE_METHOD_AVAILABILITY_NOT_FEASIBLE_CURRENCY,
            self::REASON_CODE_METHOD_AVAILABILITY_OUT_OF_RANGE_AMOUNT,
            self::REASON_CODE_METHOD_AVAILABILITY_MANDATORY_STRUCTURE_NOT_PROVIDED,
            self::REASON_CODE_METHOD_AVAILABILITY_UNSUPPORTED_BANK_PROVIDER,
            self::REASON_CODE_METHOD_AVAILABILITY_INCORRECT_INPUT,
        ];
    }

    /**
     * Gets payment_method
     *
     * @return PaymentMethod
     */
    public function getPaymentMethod()
    {
        return $this->container['payment_method'];
    }

    /**
     * Sets payment_method
     *
     * @param PaymentMethod $payment_method payment_method
     *
     * @return self
     */
    public function setPaymentMethod($payment_method)
    {
        if (is_null($payment_method)) {
            throw new SanitizedInvalidArgumentException('non-nullable payment_method cannot be null');
        }
        $this->container['payment_method'] = $payment_method;

        return $this;
    }

    /**
     * Gets is_available
     *
     * @return bool
     */
    public function getIsAvailable()
    {
        return $this->container['is_available'];
    }

    /**
     * Sets is_available
     *
     * @param bool $is_available if true, method will be shown to user. Otherwise reasonCode will be provided
     *
     * @return self
     */
    public function setIsAvailable($is_available)
    {
        if (is_null($is_available)) {
            throw new SanitizedInvalidArgumentException('non-nullable is_available cannot be null');
        }
        $this->container['is_available'] = $is_available;

        return $this;
    }

    /**
     * Gets reason_code_method_availability
     *
     * @return string|null
     */
    public function getReasonCodeMethodAvailability()
    {
        return $this->container['reason_code_method_availability'];
    }

    /**
     * Sets reason_code_method_availability
     *
     * @param string|null $reason_code_method_availability reason code. List of enumaration will be provided in documentation
     *
     * @return self
     */
    public function setReasonCodeMethodAvailability($reason_code_method_availability)
    {
        if (is_null($reason_code_method_availability)) {
            throw new SanitizedInvalidArgumentException('non-nullable reason_code_method_availability cannot be null');
        }
        $allowedValues = $this->getReasonCodeMethodAvailabilityAllowableValues();
        if (!in_array($reason_code_method_availability, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'reason_code_method_availability', must be one of '%s'", $reason_code_method_availability, implode("', '", $allowedValues)));
        }
        $this->container['reason_code_method_availability'] = $reason_code_method_availability;

        return $this;
    }

    /**
     * Gets reason_code_method_availability_description
     *
     * @return string|null
     */
    public function getReasonCodeMethodAvailabilityDescription()
    {
        return $this->container['reason_code_method_availability_description'];
    }

    /**
     * Sets reason_code_method_availability_description
     *
     * @param string|null $reason_code_method_availability_description reason code description
     *
     * @return self
     */
    public function setReasonCodeMethodAvailabilityDescription($reason_code_method_availability_description)
    {
        if (is_null($reason_code_method_availability_description)) {
            throw new SanitizedInvalidArgumentException('non-nullable reason_code_method_availability_description cannot be null');
        }
        $this->container['reason_code_method_availability_description'] = $reason_code_method_availability_description;

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
