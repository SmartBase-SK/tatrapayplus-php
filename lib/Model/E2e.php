<?php
/**
 * E2e
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class E2e implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'e2e';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'variable_symbol' => 'string',
        'specific_symbol' => 'string',
        'constant_symbol' => 'string',
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
        'variable_symbol' => null,
        'specific_symbol' => null,
        'constant_symbol' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'variable_symbol' => false,
        'specific_symbol' => false,
        'constant_symbol' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'variable_symbol' => 'variableSymbol',
        'specific_symbol' => 'specificSymbol',
        'constant_symbol' => 'constantSymbol',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'variable_symbol' => 'setVariableSymbol',
        'specific_symbol' => 'setSpecificSymbol',
        'constant_symbol' => 'setConstantSymbol',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'variable_symbol' => 'getVariableSymbol',
        'specific_symbol' => 'getSpecificSymbol',
        'constant_symbol' => 'getConstantSymbol',
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
        $this->setIfExists('variable_symbol', $data ?? [], null);
        $this->setIfExists('specific_symbol', $data ?? [], null);
        $this->setIfExists('constant_symbol', $data ?? [], null);
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

        if ($this->container['variable_symbol'] === null) {
            $invalidProperties[] = "'variable_symbol' can't be null";
        }
        if (!preg_match('/^[0-9]{1,10}$/', $this->container['variable_symbol'])) {
            $invalidProperties[] = "invalid value for 'variable_symbol', must be conform to the pattern /^[0-9]{1,10}$/.";
        }

        if (!is_null($this->container['specific_symbol']) && !preg_match('/^[0-9]{1,10}$/', $this->container['specific_symbol'])) {
            $invalidProperties[] = "invalid value for 'specific_symbol', must be conform to the pattern /^[0-9]{1,10}$/.";
        }

        if (!is_null($this->container['constant_symbol']) && !preg_match('/^[0-9]{1,4}$/', $this->container['constant_symbol'])) {
            $invalidProperties[] = "invalid value for 'constant_symbol', must be conform to the pattern /^[0-9]{1,4}$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets variable_symbol
     *
     * @return string
     */
    public function getVariableSymbol()
    {
        return $this->container['variable_symbol'];
    }

    /**
     * Sets variable_symbol
     *
     * @param string $variable_symbol variable_symbol
     *
     * @return self
     */
    public function setVariableSymbol($variable_symbol)
    {
        if (is_null($variable_symbol)) {
            throw new SanitizedInvalidArgumentException('non-nullable variable_symbol cannot be null');
        }

        if (!preg_match('/^[0-9]{1,10}$/', ObjectSerializer::toString($variable_symbol))) {
            throw new SanitizedInvalidArgumentException('invalid value for $variable_symbol when calling E2e., must conform to the pattern /^[0-9]{1,10}$/.');
        }

        $this->container['variable_symbol'] = $variable_symbol;

        return $this;
    }

    /**
     * Gets specific_symbol
     *
     * @return string|null
     */
    public function getSpecificSymbol()
    {
        return $this->container['specific_symbol'];
    }

    /**
     * Sets specific_symbol
     *
     * @param string|null $specific_symbol specific_symbol
     *
     * @return self
     */
    public function setSpecificSymbol($specific_symbol)
    {
        if (is_null($specific_symbol)) {
            throw new SanitizedInvalidArgumentException('non-nullable specific_symbol cannot be null');
        }

        if (!preg_match('/^[0-9]{1,10}$/', ObjectSerializer::toString($specific_symbol))) {
            throw new SanitizedInvalidArgumentException('invalid value for $specific_symbol when calling E2e., must conform to the pattern /^[0-9]{1,10}$/.');
        }

        $this->container['specific_symbol'] = $specific_symbol;

        return $this;
    }

    /**
     * Gets constant_symbol
     *
     * @return string|null
     */
    public function getConstantSymbol()
    {
        return $this->container['constant_symbol'];
    }

    /**
     * Sets constant_symbol
     *
     * @param string|null $constant_symbol In case of payment method CardPay will be automatically rewrite to value 0608
     *
     * @return self
     */
    public function setConstantSymbol($constant_symbol)
    {
        if (is_null($constant_symbol)) {
            throw new SanitizedInvalidArgumentException('non-nullable constant_symbol cannot be null');
        }

        if (!preg_match('/^[0-9]{1,4}$/', ObjectSerializer::toString($constant_symbol))) {
            throw new SanitizedInvalidArgumentException('invalid value for $constant_symbol when calling E2e., must conform to the pattern /^[0-9]{1,4}$/.');
        }

        $this->container['constant_symbol'] = $constant_symbol;

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
