<?php
/**
 * DirectTransactionTDSData
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;
use Tatrapayplus\TatrapayplusApiClient\TatraPayPlusService;

class DirectTransactionTDSData implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'directTransactionTDSData';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'card_holder' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'billing_address' => '\Tatrapayplus\TatrapayplusApiClient\Model\Address',
        'shipping_address' => '\Tatrapayplus\TatrapayplusApiClient\Model\Address',
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
        'card_holder' => null,
        'email' => null,
        'phone' => null,
        'billing_address' => null,
        'shipping_address' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'card_holder' => true,
        'email' => true,
        'phone' => true,
        'billing_address' => true,
        'shipping_address' => true,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'card_holder' => 'cardHolder',
        'email' => 'email',
        'phone' => 'phone',
        'billing_address' => 'billingAddress',
        'shipping_address' => 'shippingAddress',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_holder' => 'setCardHolder',
        'email' => 'setEmail',
        'phone' => 'setPhone',
        'billing_address' => 'setBillingAddress',
        'shipping_address' => 'setShippingAddress',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_holder' => 'getCardHolder',
        'email' => 'getEmail',
        'phone' => 'getPhone',
        'billing_address' => 'getBillingAddress',
        'shipping_address' => 'getShippingAddress',
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
        if ($data['card_holder']) {
            $data['card_holder'] = TatraPayPlusService::remove_diacritics($data['card_holder']);
        }
        $this->setIfExists('card_holder', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('shipping_address', $data ?? [], null);
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

        if (!preg_match('/^[ 0-9a-zA-Z.@_-]{2,45}$/', $this->container['card_holder'])) {
            $invalidProperties[] = "invalid value for 'card_holder', must be conform to the pattern /^[ 0-9a-zA-Z.@_-]{2,45}$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets card_holder
     *
     * @return string
     */
    public function getCardHolder()
    {
        return $this->container['card_holder'];
    }

    /**
     * Sets card_holder
     *
     * @param string $card_holder card_holder
     *
     * @return self
     */
    public function setCardHolder($card_holder)
    {
        if (!preg_match('/^[ 0-9a-zA-Z.@_-]{2,45}$/', ObjectSerializer::toString($card_holder))) {
            throw new SanitizedInvalidArgumentException("invalid value for 'card_holder', must be conform to the pattern /^[ 0-9a-zA-Z.@_-]{2,45}$/.");
        }

        $this->container['card_holder'] = $card_holder;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string $email email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets phone
     *
     * @return string|null
     */
    public function getPhone()
    {
        return $this->container['phone'];
    }

    /**
     * Sets phone
     *
     * @param string
     *
     * @return self
     */
    public function setPhone($phone)
    {
        $this->container['phone'] = $phone;

        return $this;
    }

    /**
     * Gets billing_address
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\Address
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\Address
     *
     * @return self
     */
    public function setBillingAddress($billing_address)
    {
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets shipping_address
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\Address
     */
    public function getShippingAddress()
    {
        return $this->container['shipping_address'];
    }

    /**
     * Sets shipping_address
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\Address
     *
     * @return self
     */
    public function setShippingAddress($shipping_address)
    {
        $this->container['shipping_address'] = $shipping_address;

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
