<?php
/**
 * ColorAttribute
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class ColorAttribute implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'colorAttribute';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'color_dark_mode' => 'string',
        'color_light_mode' => 'string',
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
        'color_dark_mode' => null,
        'color_light_mode' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'color_dark_mode' => false,
        'color_light_mode' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'color_dark_mode' => 'colorDarkMode',
        'color_light_mode' => 'colorLightMode',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'color_dark_mode' => 'setColorDarkMode',
        'color_light_mode' => 'setColorLightMode',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'color_dark_mode' => 'getColorDarkMode',
        'color_light_mode' => 'getColorLightMode',
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
        $this->setIfExists('color_dark_mode', $data ?? [], null);
        $this->setIfExists('color_light_mode', $data ?? [], null);
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

        if (!is_null($this->container['color_dark_mode']) && !preg_match('/^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/', $this->container['color_dark_mode'])) {
            $invalidProperties[] = "invalid value for 'color_dark_mode', must be conform to the pattern /^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/.";
        }

        if (!is_null($this->container['color_light_mode']) && !preg_match('/^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/', $this->container['color_light_mode'])) {
            $invalidProperties[] = "invalid value for 'color_light_mode', must be conform to the pattern /^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets color_dark_mode
     *
     * @return string|null
     */
    public function getColorDarkMode()
    {
        return $this->container['color_dark_mode'];
    }

    /**
     * Sets color_dark_mode
     *
     * @param string|null $color_dark_mode Hexadecimal value of the color
     *
     * @return self
     */
    public function setColorDarkMode($color_dark_mode)
    {
        if (is_null($color_dark_mode)) {
            throw new SanitizedInvalidArgumentException('non-nullable color_dark_mode cannot be null');
        }

        if (!preg_match('/^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/', ObjectSerializer::toString($color_dark_mode))) {
            throw new SanitizedInvalidArgumentException('invalid value for $color_dark_mode when calling ColorAttribute., must conform to the pattern /^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/.');
        }

        $this->container['color_dark_mode'] = $color_dark_mode;

        return $this;
    }

    /**
     * Gets color_light_mode
     *
     * @return string|null
     */
    public function getColorLightMode()
    {
        return $this->container['color_light_mode'];
    }

    /**
     * Sets color_light_mode
     *
     * @param string|null $color_light_mode Hexadecimal value of the color
     *
     * @return self
     */
    public function setColorLightMode($color_light_mode)
    {
        if (is_null($color_light_mode)) {
            throw new SanitizedInvalidArgumentException('non-nullable color_light_mode cannot be null');
        }

        if (!preg_match('/^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/', ObjectSerializer::toString($color_light_mode))) {
            throw new SanitizedInvalidArgumentException('invalid value for $color_light_mode when calling ColorAttribute., must conform to the pattern /^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/.');
        }

        $this->container['color_light_mode'] = $color_light_mode;

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
