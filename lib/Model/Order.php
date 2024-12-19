<?php
/**
 * Order
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class Order implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'order';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'order_no' => 'string',
        'order_items' => '\Tatrapayplus\TatrapayplusApiClient\Model\OrderItem[]',
        'preferred_loan_duration' => 'int',
        'down_payment' => 'float',
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
        'order_no' => null,
        'order_items' => null,
        'preferred_loan_duration' => 'int64',
        'down_payment' => 'double',
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'order_no' => false,
        'order_items' => false,
        'preferred_loan_duration' => false,
        'down_payment' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'order_no' => 'orderNo',
        'order_items' => 'orderItems',
        'preferred_loan_duration' => 'preferredLoanDuration',
        'down_payment' => 'downPayment',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'order_no' => 'setOrderNo',
        'order_items' => 'setOrderItems',
        'preferred_loan_duration' => 'setPreferredLoanDuration',
        'down_payment' => 'setDownPayment',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'order_no' => 'getOrderNo',
        'order_items' => 'getOrderItems',
        'preferred_loan_duration' => 'getPreferredLoanDuration',
        'down_payment' => 'getDownPayment',
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
        $this->setIfExists('order_no', $data ?? [], null);
        $this->setIfExists('order_items', $data ?? [], null);
        $this->setIfExists('preferred_loan_duration', $data ?? [], null);
        $this->setIfExists('down_payment', $data ?? [], null);
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

        if ($this->container['order_no'] === null) {
            $invalidProperties[] = "'order_no' can't be null";
        }
        if (mb_strlen($this->container['order_no']) > 100) {
            $invalidProperties[] = "invalid value for 'order_no', the character length must be smaller than or equal to 100.";
        }

        if (mb_strlen($this->container['order_no']) < 1) {
            $invalidProperties[] = "invalid value for 'order_no', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['order_items'] === null) {
            $invalidProperties[] = "'order_items' can't be null";
        }
        if (count($this->container['order_items']) > 1000) {
            $invalidProperties[] = "invalid value for 'order_items', number of items must be less than or equal to 1000.";
        }

        if (count($this->container['order_items']) < 1) {
            $invalidProperties[] = "invalid value for 'order_items', number of items must be greater than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Gets order_no
     *
     * @return string
     */
    public function getOrderNo()
    {
        return $this->container['order_no'];
    }

    /**
     * Sets order_no
     *
     * @param string $order_no Order Number. Sending the same orderNo will affect that previously created application status will change to 'CANCELLED' and new application will be created. In case that application is in state that its not possible to cancel, the error state 422 will be returned
     *
     * @return self
     */
    public function setOrderNo($order_no)
    {
        if (is_null($order_no)) {
            throw new SanitizedInvalidArgumentException('non-nullable order_no cannot be null');
        }
        if (mb_strlen($order_no) > 100) {
            throw new SanitizedInvalidArgumentException('invalid length for $order_no when calling Order., must be smaller than or equal to 100.');
        }
        if (mb_strlen($order_no) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $order_no when calling Order., must be bigger than or equal to 1.');
        }

        $this->container['order_no'] = $order_no;

        return $this;
    }

    /**
     * Gets order_items
     *
     * @return \Tatrapayplus\TatrapayplusApiClient\Model\OrderItem[]
     */
    public function getOrderItems()
    {
        return $this->container['order_items'];
    }

    /**
     * Sets order_items
     *
     * @param \Tatrapayplus\TatrapayplusApiClient\Model\OrderItem[] $order_items order_items
     *
     * @return self
     */
    public function setOrderItems($order_items)
    {
        if (is_null($order_items)) {
            throw new SanitizedInvalidArgumentException('non-nullable order_items cannot be null');
        }

        if (count($order_items) > 1000) {
            throw new SanitizedInvalidArgumentException('invalid value for $order_items when calling Order., number of items must be less than or equal to 1000.');
        }
        if (count($order_items) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $order_items when calling Order., number of items must be greater than or equal to 1.');
        }
        $this->container['order_items'] = $order_items;

        return $this;
    }

    /**
     * Gets preferred_loan_duration
     *
     * @return int|null
     */
    public function getPreferredLoanDuration()
    {
        return $this->container['preferred_loan_duration'];
    }

    /**
     * Sets preferred_loan_duration
     *
     * @param int|null $preferred_loan_duration Preferred loan payment period
     *
     * @return self
     */
    public function setPreferredLoanDuration($preferred_loan_duration)
    {
        if (is_null($preferred_loan_duration)) {
            throw new SanitizedInvalidArgumentException('non-nullable preferred_loan_duration cannot be null');
        }
        $this->container['preferred_loan_duration'] = $preferred_loan_duration;

        return $this;
    }

    /**
     * Gets down_payment
     *
     * @return float|null
     */
    public function getDownPayment()
    {
        return $this->container['down_payment'];
    }

    /**
     * Sets down_payment
     *
     * @param float|null $down_payment Downpayment for activation of service
     *
     * @return self
     */
    public function setDownPayment($down_payment)
    {
        if (is_null($down_payment)) {
            throw new SanitizedInvalidArgumentException('non-nullable down_payment cannot be null');
        }
        $this->container['down_payment'] = $down_payment;

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
