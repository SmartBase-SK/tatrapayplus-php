<?php
/**
 * Model400ErrorBody
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class Model400ErrorBody implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;
    public const ERROR_CODE_NO_CONTRACT = 'NO_CONTRACT';
    public const ERROR_CODE_ILLEGAL_ARGUMENT = 'ILLEGAL_ARGUMENT';
    public const ERROR_CODE_TOT_AMNT_LOW = 'TOT_AMNT_LOW';
    public const ERROR_CODE_TOT_AMNT_MISMATCH = 'TOT_AMNT_MISMATCH';
    public const ERROR_CODE_PAYMENT_NOT_FOUND = 'PAYMENT_NOT_FOUND';
    public const ERROR_CODE_NOT_ALLOWED_OPER = 'NOT_ALLOWED_OPER';
    public const ERROR_CODE_DUPLICATE_CALL = 'DUPLICATE_CALL';
    public const ERROR_CODE_PA_AMOUNT_EXCEEDED = 'PA_AMOUNT_EXCEEDED';
    public const ERROR_CODE_PA_NOT_FOUND = 'PA_NOT_FOUND';
    public const ERROR_CODE_PA_ERROR = 'PA_ERROR';
    public const ERROR_CODE_CB_AMOUNT_EXCEEDED = 'CB_AMOUNT_EXCEEDED';
    public const ERROR_CODE_CB_NOT_FOUND = 'CB_NOT_FOUND';
    public const ERROR_CODE_CB_TOO_OLD = 'CB_TOO_OLD';
    public const ERROR_CODE_CB_ERROR = 'CB_ERROR';
    public const ERROR_CODE_NO_AVAIL_PAY_METH = 'NO_AVAIL_PAY_METH';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = '400_errorBody';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'error_code' => 'string',
        'error_description' => 'string',
        'available_payment_methods' => '\Tatrapayplus\TatrapayplusApiClient\Model\AvailablePaymentMethod[]',
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
        'error_code' => null,
        'error_description' => null,
        'available_payment_methods' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'error_code' => false,
        'error_description' => false,
        'available_payment_methods' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'error_code' => 'errorCode',
        'error_description' => 'errorDescription',
        'available_payment_methods' => 'availablePaymentMethods',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'error_code' => 'setErrorCode',
        'error_description' => 'setErrorDescription',
        'available_payment_methods' => 'setAvailablePaymentMethods',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'error_code' => 'getErrorCode',
        'error_description' => 'getErrorDescription',
        'available_payment_methods' => 'getAvailablePaymentMethods',
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
        $this->setIfExists('error_code', $data ?? [], null);
        $this->setIfExists('error_description', $data ?? [], null);
        $this->setIfExists('available_payment_methods', $data ?? [], null);
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

        $allowedValues = $this->getErrorCodeAllowableValues();
        if (!is_null($this->container['error_code']) && !in_array($this->container['error_code'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'error_code', must be one of '%s'",
                $this->container['error_code'],
                implode("', '", $allowedValues)
            );
        }

        if (!is_null($this->container['error_code']) && (mb_strlen($this->container['error_code']) > 20)) {
            $invalidProperties[] = "invalid value for 'error_code', the character length must be smaller than or equal to 20.";
        }

        if (!is_null($this->container['error_description']) && (mb_strlen($this->container['error_description']) > 3000)) {
            $invalidProperties[] = "invalid value for 'error_description', the character length must be smaller than or equal to 3000.";
        }

        return $invalidProperties;
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getErrorCodeAllowableValues()
    {
        return [
            self::ERROR_CODE_NO_CONTRACT,
            self::ERROR_CODE_ILLEGAL_ARGUMENT,
            self::ERROR_CODE_TOT_AMNT_LOW,
            self::ERROR_CODE_TOT_AMNT_MISMATCH,
            self::ERROR_CODE_PAYMENT_NOT_FOUND,
            self::ERROR_CODE_NOT_ALLOWED_OPER,
            self::ERROR_CODE_DUPLICATE_CALL,
            self::ERROR_CODE_PA_AMOUNT_EXCEEDED,
            self::ERROR_CODE_PA_NOT_FOUND,
            self::ERROR_CODE_PA_ERROR,
            self::ERROR_CODE_CB_AMOUNT_EXCEEDED,
            self::ERROR_CODE_CB_NOT_FOUND,
            self::ERROR_CODE_CB_TOO_OLD,
            self::ERROR_CODE_CB_ERROR,
            self::ERROR_CODE_NO_AVAIL_PAY_METH,
        ];
    }

    /**
     * Gets error_code
     *
     * @return string|null
     */
    public function getErrorCode()
    {
        return $this->container['error_code'];
    }

    /**
     * Sets error_code
     *
     * @param string|null $error_code error_code
     *
     * @return self
     */
    public function setErrorCode($error_code)
    {
        if (is_null($error_code)) {
            throw new SanitizedInvalidArgumentException('non-nullable error_code cannot be null');
        }
        $allowedValues = $this->getErrorCodeAllowableValues();
        if (!in_array($error_code, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'error_code', must be one of '%s'", $error_code, implode("', '", $allowedValues)));
        }
        if (mb_strlen($error_code) > 20) {
            throw new SanitizedInvalidArgumentException('invalid length for $error_code when calling Model400ErrorBody., must be smaller than or equal to 20.');
        }

        $this->container['error_code'] = $error_code;

        return $this;
    }

    /**
     * Gets error_description
     *
     * @return string|null
     */
    public function getErrorDescription()
    {
        return $this->container['error_description'];
    }

    /**
     * Sets error_description
     *
     * @param string|null $error_description error_description
     *
     * @return self
     */
    public function setErrorDescription($error_description)
    {
        if (is_null($error_description)) {
            throw new SanitizedInvalidArgumentException('non-nullable error_description cannot be null');
        }
        if (mb_strlen($error_description) > 3000) {
            throw new SanitizedInvalidArgumentException('invalid length for $error_description when calling Model400ErrorBody., must be smaller than or equal to 3000.');
        }

        $this->container['error_description'] = $error_description;

        return $this;
    }

    /**
     * Gets available_payment_methods
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\AvailablePaymentMethod[]|null
     */
    public function getAvailablePaymentMethods()
    {
        return $this->container['available_payment_methods'];
    }

    /**
     * Sets available_payment_methods
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\AvailablePaymentMethod[]|null $available_payment_methods Reason codes of declined methods
     *
     * @return self
     */
    public function setAvailablePaymentMethods($available_payment_methods)
    {
        if (is_null($available_payment_methods)) {
            throw new SanitizedInvalidArgumentException('non-nullable available_payment_methods cannot be null');
        }
        $this->container['available_payment_methods'] = $available_payment_methods;

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
