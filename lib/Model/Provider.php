<?php
/**
 * Provider
 *
 * PHP version 8.1
 *
 * @category Class
 * @package  Tatrapayplus\TatrapayplusApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * TatraPayPlus API
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 0.0.1_2024-05-27v1
 * Generated by: https://openapi-generator.tech
 * Generator version: 7.13.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use \ArrayAccess;
use \Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

/**
 * Provider Class Doc Comment
 *
 * @category Class
 * @description Data provider
 * @package  Tatrapayplus\TatrapayplusApiClient
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class Provider implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'provider';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'country_code' => 'string',
        'provider_name' => 'string',
        'provider_code' => 'string',
        'swift_code' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'country_code' => null,
        'provider_name' => null,
        'provider_code' => null,
        'swift_code' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'country_code' => false,
        'provider_name' => false,
        'provider_code' => false,
        'swift_code' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

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
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'country_code' => 'countryCode',
        'provider_name' => 'providerName',
        'provider_code' => 'providerCode',
        'swift_code' => 'swiftCode'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'country_code' => 'setCountryCode',
        'provider_name' => 'setProviderName',
        'provider_code' => 'setProviderCode',
        'swift_code' => 'setSwiftCode'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'country_code' => 'getCountryCode',
        'provider_name' => 'getProviderName',
        'provider_code' => 'getProviderCode',
        'swift_code' => 'getSwiftCode'
    ];

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
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[]|null $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('country_code', $data ?? [], null);
        $this->setIfExists('provider_name', $data ?? [], null);
        $this->setIfExists('provider_code', $data ?? [], null);
        $this->setIfExists('swift_code', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['country_code'] === null) {
            $invalidProperties[] = "'country_code' can't be null";
        }
        if (!preg_match("/[A-Z]{2}/", $this->container['country_code'])) {
            $invalidProperties[] = "invalid value for 'country_code', must be conform to the pattern /[A-Z]{2}/.";
        }

        if ($this->container['provider_name'] === null) {
            $invalidProperties[] = "'provider_name' can't be null";
        }
        if ((mb_strlen($this->container['provider_name']) > 500)) {
            $invalidProperties[] = "invalid value for 'provider_name', the character length must be smaller than or equal to 500.";
        }

        if ($this->container['provider_code'] === null) {
            $invalidProperties[] = "'provider_code' can't be null";
        }
        if ((mb_strlen($this->container['provider_code']) > 50)) {
            $invalidProperties[] = "invalid value for 'provider_code', the character length must be smaller than or equal to 50.";
        }

        if ($this->container['swift_code'] === null) {
            $invalidProperties[] = "'swift_code' can't be null";
        }
        if (!preg_match("/[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/", $this->container['swift_code'])) {
            $invalidProperties[] = "invalid value for 'swift_code', must be conform to the pattern /[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/.";
        }

        return $invalidProperties;
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
     * Gets country_code
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->container['country_code'];
    }

    /**
     * Sets country_code
     *
     * @param string $country_code ISO 3166 ALPHA2 country code.
     *
     * @return self
     */
    public function setCountryCode($country_code)
    {
        if (is_null($country_code)) {
            throw new \InvalidArgumentException('non-nullable country_code cannot be null');
        }

        if ((!preg_match("/[A-Z]{2}/", ObjectSerializer::toString($country_code)))) {
            throw new \InvalidArgumentException("invalid value for \$country_code when calling Provider., must conform to the pattern /[A-Z]{2}/.");
        }

        $this->container['country_code'] = $country_code;

        return $this;
    }

    /**
     * Gets provider_name
     *
     * @return string
     */
    public function getProviderName()
    {
        return $this->container['provider_name'];
    }

    /**
     * Sets provider_name
     *
     * @param string $provider_name provider_name
     *
     * @return self
     */
    public function setProviderName($provider_name)
    {
        if (is_null($provider_name)) {
            throw new \InvalidArgumentException('non-nullable provider_name cannot be null');
        }
        if ((mb_strlen($provider_name) > 500)) {
            throw new \InvalidArgumentException('invalid length for $provider_name when calling Provider., must be smaller than or equal to 500.');
        }

        $this->container['provider_name'] = $provider_name;

        return $this;
    }

    /**
     * Gets provider_code
     *
     * @return string
     */
    public function getProviderCode()
    {
        return $this->container['provider_code'];
    }

    /**
     * Sets provider_code
     *
     * @param string $provider_code provider_code
     *
     * @return self
     */
    public function setProviderCode($provider_code)
    {
        if (is_null($provider_code)) {
            throw new \InvalidArgumentException('non-nullable provider_code cannot be null');
        }
        if ((mb_strlen($provider_code) > 50)) {
            throw new \InvalidArgumentException('invalid length for $provider_code when calling Provider., must be smaller than or equal to 50.');
        }

        $this->container['provider_code'] = $provider_code;

        return $this;
    }

    /**
     * Gets swift_code
     *
     * @return string
     */
    public function getSwiftCode()
    {
        return $this->container['swift_code'];
    }

    /**
     * Sets swift_code
     *
     * @param string $swift_code BICFI
     *
     * @return self
     */
    public function setSwiftCode($swift_code)
    {
        if (is_null($swift_code)) {
            throw new \InvalidArgumentException('non-nullable swift_code cannot be null');
        }

        if ((!preg_match("/[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/", ObjectSerializer::toString($swift_code)))) {
            throw new \InvalidArgumentException("invalid value for \$swift_code when calling Provider., must conform to the pattern /[A-Z]{6,6}[A-Z2-9][A-NP-Z0-9]([A-Z0-9]{3,3}){0,1}/.");
        }

        $this->container['swift_code'] = $swift_code;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
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
     * @param mixed    $value  Value to be set
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
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


