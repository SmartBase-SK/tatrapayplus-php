<?php
/**
 * DirectTransactionIPSPData
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class DirectTransactionIPSPData implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'directTransactionIPSPData';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'sub_merchant_id' => 'string',
        'name' => 'string',
        'location' => 'string',
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
        'sub_merchant_id' => null,
        'name' => null,
        'location' => null,
        'country' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'sub_merchant_id' => false,
        'name' => false,
        'location' => false,
        'country' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'sub_merchant_id' => 'subMerchantId',
        'name' => 'name',
        'location' => 'location',
        'country' => 'country',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sub_merchant_id' => 'setSubMerchantId',
        'name' => 'setName',
        'location' => 'setLocation',
        'country' => 'setCountry',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sub_merchant_id' => 'getSubMerchantId',
        'name' => 'getName',
        'location' => 'getLocation',
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
        $this->setIfExists('sub_merchant_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('location', $data ?? [], null);
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

        if (!preg_match('/^[0-9]*$/', $this->container['sub_merchant_id'])) {
            $invalidProperties[] = "invalid value for 'sub_merchant_id', must be conform to the pattern /^[0-9]*$/.";
        }

        if (!is_null($this->container['name']) && !preg_match("/^[ 0-9a-zA-Z?:()\/\\.,'+-]{1,25}$/", $this->container['name'])) {
            $invalidProperties[] = "invalid value for 'name', must be conform to the pattern /^[ 0-9a-zA-Z?:()\/\\.,'+-]{1,25}$/.";
        }

        if (!is_null($this->container['location']) && !preg_match('/^[ 0-9a-zA-Z-]{1,13}$/', $this->container['location'])) {
            $invalidProperties[] = "invalid value for 'location', must be conform to the pattern /^[ 0-9a-zA-Z-]{1,13}$/.";
        }

        if (!is_null($this->container['country']) && !preg_match('/^[A-Z]{2}$/', $this->container['country'])) {
            $invalidProperties[] = "invalid value for 'country', must be conform to the pattern /^[A-Z]{2}$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets sub_merchant_id
     *
     * @return string
     */
    public function getSubMerchantId()
    {
        return $this->container['sub_merchant_id'];
    }

    /**
     * Sets sub_merchant_id
     *
     * @param string $sub_merchant_id sub_merchant_id
     *
     * @return self
     */
    public function setSubMerchantId($sub_merchant_id)
    {
        if (is_null($sub_merchant_id)) {
            throw new SanitizedInvalidArgumentException('non-nullable sub_merchant_id cannot be null');
        }

        if (!preg_match('/^[0-9]*$/', ObjectSerializer::toString($sub_merchant_id))) {
            throw new SanitizedInvalidArgumentException("invalid value for 'sub_merchant_id', must be conform to the pattern /^[0-9]*$/.");
        }

        $this->container['sub_merchant_id'] = $sub_merchant_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new SanitizedInvalidArgumentException('non-nullable name cannot be null');
        }

        if (!preg_match("/^[ 0-9a-zA-Z?:()\/\\.,'+-]{1,25}$/", ObjectSerializer::toString($name))) {
            throw new SanitizedInvalidArgumentException("invalid value for 'name', must be conform to the pattern /^[ 0-9a-zA-Z?:()\/\\.,'+-]{1,25}$/.");
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets location
     *
     * @return string|null
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param string
     *
     * @return self
     */
    public function setLocation($location)
    {
        if (is_null($location)) {
            throw new SanitizedInvalidArgumentException('non-nullable location cannot be null');
        }

        if (!preg_match('/^[ 0-9a-zA-Z-]{1,13}$/', ObjectSerializer::toString($location))) {
            throw new SanitizedInvalidArgumentException("invalid value for 'location', must be conform to the pattern /^[ 0-9a-zA-Z-]{1,13}$/.");
        }

        $this->container['location'] = $location;

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
     * @param string
     *
     * @return self
     */
    public function setCountry($country)
    {
        if (is_null($country)) {
            throw new SanitizedInvalidArgumentException('non-nullable country cannot be null');
        }

        if (!preg_match('/^[A-Z]{2}$/', ObjectSerializer::toString($country))) {
            throw new SanitizedInvalidArgumentException("invalid value for 'country', must be conform to the pattern /^[A-Z]{2}$/.");
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
