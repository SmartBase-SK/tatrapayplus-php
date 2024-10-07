<?php
/**
 * AppearanceRequest
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class AppearanceRequest implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;
    public const THEME_DARK = 'DARK';
    public const THEME_LIGHT = 'LIGHT';
    public const THEME_SYSTEM = 'SYSTEM';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'appearanceRequest';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'theme' => 'string',
        'tint_on_accent' => '\Tatrapayplus\TatrapayplusApiClient\Model\ColorAttribute',
        'tint_accent' => '\Tatrapayplus\TatrapayplusApiClient\Model\ColorAttribute',
        'surface_accent' => '\Tatrapayplus\TatrapayplusApiClient\Model\ColorAttribute',
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
        'theme' => null,
        'tint_on_accent' => null,
        'tint_accent' => null,
        'surface_accent' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'theme' => false,
        'tint_on_accent' => false,
        'tint_accent' => false,
        'surface_accent' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'theme' => 'theme',
        'tint_on_accent' => 'tintOnAccent',
        'tint_accent' => 'tintAccent',
        'surface_accent' => 'surfaceAccent',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'theme' => 'setTheme',
        'tint_on_accent' => 'setTintOnAccent',
        'tint_accent' => 'setTintAccent',
        'surface_accent' => 'setSurfaceAccent',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'theme' => 'getTheme',
        'tint_on_accent' => 'getTintOnAccent',
        'tint_accent' => 'getTintAccent',
        'surface_accent' => 'getSurfaceAccent',
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
        $this->setIfExists('theme', $data ?? [], 'SYSTEM');
        $this->setIfExists('tint_on_accent', $data ?? [], null);
        $this->setIfExists('tint_accent', $data ?? [], null);
        $this->setIfExists('surface_accent', $data ?? [], null);
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

        $allowedValues = $this->getThemeAllowableValues();
        if (!is_null($this->container['theme']) && !in_array($this->container['theme'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'theme', must be one of '%s'",
                $this->container['theme'],
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
    public function getThemeAllowableValues()
    {
        return [
            self::THEME_DARK,
            self::THEME_LIGHT,
            self::THEME_SYSTEM,
        ];
    }

    /**
     * Gets theme
     *
     * @return string|null
     */
    public function getTheme()
    {
        return $this->container['theme'];
    }

    /**
     * Sets theme
     *
     * @param string|null $theme theme
     *
     * @return self
     */
    public function setTheme($theme)
    {
        if (is_null($theme)) {
            throw new SanitizedInvalidArgumentException('non-nullable theme cannot be null');
        }
        $allowedValues = $this->getThemeAllowableValues();
        if (!in_array($theme, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'theme', must be one of '%s'", $theme, implode("', '", $allowedValues)));
        }
        $this->container['theme'] = $theme;

        return $this;
    }

    /**
     * Gets tint_on_accent
     *
     * @return ColorAttribute|null
     */
    public function getTintOnAccent()
    {
        return $this->container['tint_on_accent'];
    }

    /**
     * Sets tint_on_accent
     *
     * @param ColorAttribute|null $tint_on_accent tint_on_accent
     *
     * @return self
     */
    public function setTintOnAccent($tint_on_accent)
    {
        if (is_null($tint_on_accent)) {
            throw new SanitizedInvalidArgumentException('non-nullable tint_on_accent cannot be null');
        }
        $this->container['tint_on_accent'] = $tint_on_accent;

        return $this;
    }

    /**
     * Gets tint_accent
     *
     * @return ColorAttribute|null
     */
    public function getTintAccent()
    {
        return $this->container['tint_accent'];
    }

    /**
     * Sets tint_accent
     *
     * @param ColorAttribute|null $tint_accent tint_accent
     *
     * @return self
     */
    public function setTintAccent($tint_accent)
    {
        if (is_null($tint_accent)) {
            throw new SanitizedInvalidArgumentException('non-nullable tint_accent cannot be null');
        }
        $this->container['tint_accent'] = $tint_accent;

        return $this;
    }

    /**
     * Gets surface_accent
     *
     * @return ColorAttribute|null
     */
    public function getSurfaceAccent()
    {
        return $this->container['surface_accent'];
    }

    /**
     * Sets surface_accent
     *
     * @param ColorAttribute|null $surface_accent surface_accent
     *
     * @return self
     */
    public function setSurfaceAccent($surface_accent)
    {
        if (is_null($surface_accent)) {
            throw new SanitizedInvalidArgumentException('non-nullable surface_accent cannot be null');
        }
        $this->container['surface_accent'] = $surface_accent;

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