<?php
/**
 * Address
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class Address implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'address';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'street_name' => 'string',
        'building_number' => 'string',
        'town_name' => 'string',
        'post_code' => 'string',
        'country' => 'string',
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
        'street_name' => null,
        'building_number' => null,
        'town_name' => null,
        'post_code' => null,
        'country' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'street_name' => false,
        'building_number' => false,
        'town_name' => false,
        'post_code' => false,
        'country' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'street_name' => 'streetName',
        'building_number' => 'buildingNumber',
        'town_name' => 'townName',
        'post_code' => 'postCode',
        'country' => 'country',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'street_name' => 'setStreetName',
        'building_number' => 'setBuildingNumber',
        'town_name' => 'setTownName',
        'post_code' => 'setPostCode',
        'country' => 'setCountry',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'street_name' => 'getStreetName',
        'building_number' => 'getBuildingNumber',
        'town_name' => 'getTownName',
        'post_code' => 'getPostCode',
        'country' => 'getCountry',
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
        $this->setIfExists('street_name', $data ?? [], null);
        $this->setIfExists('building_number', $data ?? [], null);
        $this->setIfExists('town_name', $data ?? [], null);
        $this->setIfExists('post_code', $data ?? [], null);
        $this->setIfExists('country', $data ?? [], null);
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

        if (!is_null($this->container['street_name']) && (mb_strlen($this->container['street_name']) > 40)) {
            $invalidProperties[] = "invalid value for 'street_name', the character length must be smaller than or equal to 40.";
        }

        if (!is_null($this->container['building_number']) && (mb_strlen($this->container['building_number']) > 10)) {
            $invalidProperties[] = "invalid value for 'building_number', the character length must be smaller than or equal to 10.";
        }

        if (!is_null($this->container['town_name']) && (mb_strlen($this->container['town_name']) > 35)) {
            $invalidProperties[] = "invalid value for 'town_name', the character length must be smaller than or equal to 35.";
        }

        if (!is_null($this->container['post_code']) && (mb_strlen($this->container['post_code']) > 10)) {
            $invalidProperties[] = "invalid value for 'post_code', the character length must be smaller than or equal to 10.";
        }

        if ($this->container['country'] === null) {
            $invalidProperties[] = "'country' can't be null";
        }
        if (!preg_match('/[A-Z]{2}/', $this->container['country'])) {
            $invalidProperties[] = "invalid value for 'country', must be conform to the pattern /[A-Z]{2}/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets street_name
     *
     * @return string|null
     */
    public function getStreetName()
    {
        return $this->container['street_name'];
    }

    /**
     * Sets street_name
     *
     * @param string|null $street_name street_name
     *
     * @return self
     */
    public function setStreetName($street_name)
    {
        if (is_null($street_name)) {
            throw new SanitizedInvalidArgumentException('non-nullable street_name cannot be null');
        }
        if (mb_strlen($street_name) > 40) {
            throw new SanitizedInvalidArgumentException('invalid length for $street_name when calling Address., must be smaller than or equal to 40.');
        }

        $this->container['street_name'] = $street_name;

        return $this;
    }

    /**
     * Gets building_number
     *
     * @return string|null
     */
    public function getBuildingNumber()
    {
        return $this->container['building_number'];
    }

    /**
     * Sets building_number
     *
     * @param string|null $building_number building_number
     *
     * @return self
     */
    public function setBuildingNumber($building_number)
    {
        if (is_null($building_number)) {
            throw new SanitizedInvalidArgumentException('non-nullable building_number cannot be null');
        }
        if (mb_strlen($building_number) > 10) {
            throw new SanitizedInvalidArgumentException('invalid length for $building_number when calling Address., must be smaller than or equal to 10.');
        }

        $this->container['building_number'] = $building_number;

        return $this;
    }

    /**
     * Gets town_name
     *
     * @return string|null
     */
    public function getTownName()
    {
        return $this->container['town_name'];
    }

    /**
     * Sets town_name
     *
     * @param string|null $town_name town_name
     *
     * @return self
     */
    public function setTownName($town_name)
    {
        if (is_null($town_name)) {
            throw new SanitizedInvalidArgumentException('non-nullable town_name cannot be null');
        }
        if (mb_strlen($town_name) > 35) {
            throw new SanitizedInvalidArgumentException('invalid length for $town_name when calling Address., must be smaller than or equal to 35.');
        }

        $this->container['town_name'] = $town_name;

        return $this;
    }

    /**
     * Gets post_code
     *
     * @return string|null
     */
    public function getPostCode()
    {
        return $this->container['post_code'];
    }

    /**
     * Sets post_code
     *
     * @param string|null $post_code post_code
     *
     * @return self
     */
    public function setPostCode($post_code)
    {
        if (is_null($post_code)) {
            throw new SanitizedInvalidArgumentException('non-nullable post_code cannot be null');
        }
        if (mb_strlen($post_code) > 10) {
            throw new SanitizedInvalidArgumentException('invalid length for $post_code when calling Address., must be smaller than or equal to 10.');
        }

        $this->container['post_code'] = $post_code;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string $country ISO 3166 ALPHA2 country code
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new SanitizedInvalidArgumentException('non-nullable country cannot be null');
        }

        if (!preg_match('/[A-Z]{2}/', ObjectSerializer::toString($country))) {
            throw new SanitizedInvalidArgumentException('invalid value for $country when calling Address., must conform to the pattern /[A-Z]{2}/.');
        }

        $this->container['country'] = $country;

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
