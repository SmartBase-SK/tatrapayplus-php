<?php
/**
 * ItemDetailLangUnit
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class ItemDetailLangUnit implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'itemDetailLangUnit';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'item_name' => 'string',
        'item_description' => 'string',
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
        'item_name' => null,
        'item_description' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'item_name' => false,
        'item_description' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'item_name' => 'itemName',
        'item_description' => 'itemDescription',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'item_name' => 'setItemName',
        'item_description' => 'setItemDescription',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'item_name' => 'getItemName',
        'item_description' => 'getItemDescription',
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
        $this->setIfExists('item_name', $data ?? [], null);
        $this->setIfExists('item_description', $data ?? [], null);
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

        if ($this->container['item_name'] === null) {
            $invalidProperties[] = "'item_name' can't be null";
        }
        if (mb_strlen($this->container['item_name']) > 255) {
            $invalidProperties[] = "invalid value for 'item_name', the character length must be smaller than or equal to 255.";
        }

        if (mb_strlen($this->container['item_name']) < 1) {
            $invalidProperties[] = "invalid value for 'item_name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['item_description']) && (mb_strlen($this->container['item_description']) > 1000)) {
            $invalidProperties[] = "invalid value for 'item_description', the character length must be smaller than or equal to 1000.";
        }

        if (!is_null($this->container['item_description']) && (mb_strlen($this->container['item_description']) < 1)) {
            $invalidProperties[] = "invalid value for 'item_description', the character length must be bigger than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Gets item_name
     *
     * @return string
     */
    public function getItemName()
    {
        return $this->container['item_name'];
    }

    /**
     * Sets item_name
     *
     * @param string $item_name item_name
     *
     * @return self
     */
    public function setItemName($item_name)
    {
        if (is_null($item_name)) {
            throw new SanitizedInvalidArgumentException('non-nullable item_name cannot be null');
        }
        if (mb_strlen($item_name) > 255) {
            throw new SanitizedInvalidArgumentException('invalid length for $item_name when calling ItemDetailLangUnit., must be smaller than or equal to 255.');
        }
        if (mb_strlen($item_name) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $item_name when calling ItemDetailLangUnit., must be bigger than or equal to 1.');
        }

        $this->container['item_name'] = $item_name;

        return $this;
    }

    /**
     * Gets item_description
     *
     * @return string|null
     */
    public function getItemDescription()
    {
        return $this->container['item_description'];
    }

    /**
     * Sets item_description
     *
     * @param string|null $item_description item_description
     *
     * @return self
     */
    public function setItemDescription($item_description)
    {
        if (is_null($item_description)) {
            throw new SanitizedInvalidArgumentException('non-nullable item_description cannot be null');
        }
        if (mb_strlen($item_description) > 1000) {
            throw new SanitizedInvalidArgumentException('invalid length for $item_description when calling ItemDetailLangUnit., must be smaller than or equal to 1000.');
        }
        if (mb_strlen($item_description) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $item_description when calling ItemDetailLangUnit., must be bigger than or equal to 1.');
        }

        $this->container['item_description'] = $item_description;

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
