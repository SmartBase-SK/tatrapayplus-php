<?php
/**
 * CapacityInfo
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class CapacityInfo implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'capacityInfo';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'monthly_income' => 'float',
        'monthly_expenses' => 'float',
        'number_of_children' => 'int',
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
        'monthly_income' => 'double',
        'monthly_expenses' => 'double',
        'number_of_children' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'monthly_income' => false,
        'monthly_expenses' => false,
        'number_of_children' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'monthly_income' => 'monthlyIncome',
        'monthly_expenses' => 'monthlyExpenses',
        'number_of_children' => 'numberOfChildren',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'monthly_income' => 'setMonthlyIncome',
        'monthly_expenses' => 'setMonthlyExpenses',
        'number_of_children' => 'setNumberOfChildren',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'monthly_income' => 'getMonthlyIncome',
        'monthly_expenses' => 'getMonthlyExpenses',
        'number_of_children' => 'getNumberOfChildren',
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
        $this->setIfExists('monthly_income', $data ?? [], null);
        $this->setIfExists('monthly_expenses', $data ?? [], null);
        $this->setIfExists('number_of_children', $data ?? [], null);
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

        if ($this->container['monthly_income'] === null) {
            $invalidProperties[] = "'monthly_income' can't be null";
        }
        if ($this->container['monthly_expenses'] === null) {
            $invalidProperties[] = "'monthly_expenses' can't be null";
        }
        if ($this->container['number_of_children'] === null) {
            $invalidProperties[] = "'number_of_children' can't be null";
        }
        if ($this->container['number_of_children'] < 0) {
            $invalidProperties[] = "invalid value for 'number_of_children', must be bigger than or equal to 0.";
        }

        return $invalidProperties;
    }

    /**
     * Gets monthly_income
     *
     * @return float
     */
    public function getMonthlyIncome()
    {
        return $this->container['monthly_income'];
    }

    /**
     * Sets monthly_income
     *
     * @param float $monthly_income Declared monthly income by user
     *
     * @return self
     */
    public function setMonthlyIncome($monthly_income)
    {
        if (is_null($monthly_income)) {
            throw new SanitizedInvalidArgumentException('non-nullable monthly_income cannot be null');
        }
        $this->container['monthly_income'] = $monthly_income;

        return $this;
    }

    /**
     * Gets monthly_expenses
     *
     * @return float
     */
    public function getMonthlyExpenses()
    {
        return $this->container['monthly_expenses'];
    }

    /**
     * Sets monthly_expenses
     *
     * @param float $monthly_expenses Declared monthly expenses by user
     *
     * @return self
     */
    public function setMonthlyExpenses($monthly_expenses)
    {
        if (is_null($monthly_expenses)) {
            throw new SanitizedInvalidArgumentException('non-nullable monthly_expenses cannot be null');
        }
        $this->container['monthly_expenses'] = $monthly_expenses;

        return $this;
    }

    /**
     * Gets number_of_children
     *
     * @return int
     */
    public function getNumberOfChildren()
    {
        return $this->container['number_of_children'];
    }

    /**
     * Sets number_of_children
     *
     * @param int $number_of_children Declared number of children of user
     *
     * @return self
     */
    public function setNumberOfChildren($number_of_children)
    {
        if (is_null($number_of_children)) {
            throw new SanitizedInvalidArgumentException('non-nullable number_of_children cannot be null');
        }

        if ($number_of_children < 0) {
            throw new SanitizedInvalidArgumentException('invalid value for $number_of_children when calling CapacityInfo., must be bigger than or equal to 0.');
        }

        $this->container['number_of_children'] = $number_of_children;

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
