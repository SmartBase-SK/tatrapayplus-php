<?php
/**
 * OrderItem
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class OrderItem implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'orderItem';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'quantity' => 'int',
        'total_item_price' => 'float',
        'item_detail' => '\Tatrapayplus\TatrapayplusApiClient\Model\ItemDetail',
        'item_info_url' => 'string',
        'item_image' => 'string',
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
        'quantity' => 'int64',
        'total_item_price' => 'double',
        'item_detail' => null,
        'item_info_url' => 'uri',
        'item_image' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'quantity' => false,
        'total_item_price' => false,
        'item_detail' => false,
        'item_info_url' => false,
        'item_image' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'quantity' => 'quantity',
        'total_item_price' => 'totalItemPrice',
        'item_detail' => 'itemDetail',
        'item_info_url' => 'itemInfoURL',
        'item_image' => 'itemImage',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'quantity' => 'setQuantity',
        'total_item_price' => 'setTotalItemPrice',
        'item_detail' => 'setItemDetail',
        'item_info_url' => 'setItemInfoUrl',
        'item_image' => 'setItemImage',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'quantity' => 'getQuantity',
        'total_item_price' => 'getTotalItemPrice',
        'item_detail' => 'getItemDetail',
        'item_info_url' => 'getItemInfoUrl',
        'item_image' => 'getItemImage',
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
        $this->setIfExists('quantity', $data ?? [], null);
        $this->setIfExists('total_item_price', $data ?? [], null);
        $this->setIfExists('item_detail', $data ?? [], null);
        $this->setIfExists('item_info_url', $data ?? [], null);
        $this->setIfExists('item_image', $data ?? [], null);
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

        if ($this->container['quantity'] === null) {
            $invalidProperties[] = "'quantity' can't be null";
        }
        if ($this->container['total_item_price'] === null) {
            $invalidProperties[] = "'total_item_price' can't be null";
        }
        if ($this->container['item_detail'] === null) {
            $invalidProperties[] = "'item_detail' can't be null";
        }
        if (!is_null($this->container['item_image']) && (mb_strlen($this->container['item_image']) > 1000000)) {
            $invalidProperties[] = "invalid value for 'item_image', the character length must be smaller than or equal to 1000000.";
        }

        return $invalidProperties;
    }

    /**
     * Gets quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->container['quantity'];
    }

    /**
     * Sets quantity
     *
     * @param int $quantity Quantity of the item
     *
     * @return self
     */
    public function setQuantity($quantity)
    {
        if (is_null($quantity)) {
            throw new SanitizedInvalidArgumentException('non-nullable quantity cannot be null');
        }
        $this->container['quantity'] = $quantity;

        return $this;
    }

    /**
     * Gets total_item_price
     *
     * @return float
     */
    public function getTotalItemPrice()
    {
        return $this->container['total_item_price'];
    }

    /**
     * Sets total_item_price
     *
     * @param float $total_item_price Total item price (including quantity e.g.:(item price*quantity))
     *
     * @return self
     */
    public function setTotalItemPrice($total_item_price)
    {
        if (is_null($total_item_price)) {
            throw new SanitizedInvalidArgumentException('non-nullable total_item_price cannot be null');
        }
        $this->container['total_item_price'] = $total_item_price;

        return $this;
    }

    /**
     * Gets item_detail
     *
     * @return ItemDetail
     */
    public function getItemDetail()
    {
        return $this->container['item_detail'];
    }

    /**
     * Sets item_detail
     *
     * @param ItemDetail $item_detail item_detail
     *
     * @return self
     */
    public function setItemDetail($item_detail)
    {
        if (is_null($item_detail)) {
            throw new SanitizedInvalidArgumentException('non-nullable item_detail cannot be null');
        }
        $this->container['item_detail'] = $item_detail;

        return $this;
    }

    /**
     * Gets item_info_url
     *
     * @return string|null
     */
    public function getItemInfoUrl()
    {
        return $this->container['item_info_url'];
    }

    /**
     * Sets item_info_url
     *
     * @param string|null $item_info_url item_info_url
     *
     * @return self
     */
    public function setItemInfoUrl($item_info_url)
    {
        if (is_null($item_info_url)) {
            throw new SanitizedInvalidArgumentException('non-nullable item_info_url cannot be null');
        }
        $this->container['item_info_url'] = $item_info_url;

        return $this;
    }

    /**
     * Gets item_image
     *
     * @return string|null
     */
    public function getItemImage()
    {
        return $this->container['item_image'];
    }

    /**
     * Sets item_image
     *
     * @param string|null $item_image base64 encoded image h:48px w:48px
     *
     * @return self
     */
    public function setItemImage($item_image)
    {
        if (is_null($item_image)) {
            throw new SanitizedInvalidArgumentException('non-nullable item_image cannot be null');
        }
        if (mb_strlen($item_image) > 1000000) {
            throw new SanitizedInvalidArgumentException('invalid length for $item_image when calling OrderItem., must be smaller than or equal to 1000000.');
        }

        $this->container['item_image'] = $item_image;

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
