<?php
/**
 * InitiatePaymentRequest
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class InitiatePaymentRequest implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'initiatePaymentRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'base_payment' => '\Tatrapayplus\TatrapayplusApiClient\Model\BasePayment',
        'user_data' => '\Tatrapayplus\TatrapayplusApiClient\Model\UserData',
        'bank_transfer' => '\Tatrapayplus\TatrapayplusApiClient\Model\BankTransfer',
        'card_detail' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardDetail',
        'pay_later' => '\Tatrapayplus\TatrapayplusApiClient\Model\PayLater',
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
        'base_payment' => null,
        'user_data' => null,
        'bank_transfer' => null,
        'card_detail' => null,
        'pay_later' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'base_payment' => false,
        'user_data' => false,
        'bank_transfer' => false,
        'card_detail' => false,
        'pay_later' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'base_payment' => 'basePayment',
        'user_data' => 'userData',
        'bank_transfer' => 'bankTransfer',
        'card_detail' => 'cardDetail',
        'pay_later' => 'payLater',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'base_payment' => 'setBasePayment',
        'user_data' => 'setUserData',
        'bank_transfer' => 'setBankTransfer',
        'card_detail' => 'setCardDetail',
        'pay_later' => 'setPayLater',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'base_payment' => 'getBasePayment',
        'user_data' => 'getUserData',
        'bank_transfer' => 'getBankTransfer',
        'card_detail' => 'getCardDetail',
        'pay_later' => 'getPayLater',
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
        $this->setIfExists('base_payment', $data ?? [], null);
        $this->setIfExists('user_data', $data ?? [], null);
        $this->setIfExists('bank_transfer', $data ?? [], null);
        $this->setIfExists('card_detail', $data ?? [], null);
        $this->setIfExists('pay_later', $data ?? [], null);
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

        if ($this->container['base_payment'] === null) {
            $invalidProperties[] = "'base_payment' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Gets base_payment
     *
     * @return BasePayment
     */
    public function getBasePayment()
    {
        return $this->container['base_payment'];
    }

    /**
     * Sets base_payment
     *
     * @param BasePayment $base_payment base_payment
     *
     * @return self
     */
    public function setBasePayment($base_payment)
    {
        if (is_null($base_payment)) {
            throw new SanitizedInvalidArgumentException('non-nullable base_payment cannot be null');
        }
        $this->container['base_payment'] = $base_payment;

        return $this;
    }

    /**
     * Gets user_data
     *
     * @return UserData|null
     */
    public function getUserData()
    {
        return $this->container['user_data'];
    }

    /**
     * Sets user_data
     *
     * @param UserData|null $user_data user_data
     *
     * @return self
     */
    public function setUserData($user_data)
    {
        if (is_null($user_data)) {
            throw new SanitizedInvalidArgumentException('non-nullable user_data cannot be null');
        }
        $this->container['user_data'] = $user_data;

        return $this;
    }

    /**
     * Gets bank_transfer
     *
     * @return BankTransfer|null
     */
    public function getBankTransfer()
    {
        return $this->container['bank_transfer'];
    }

    /**
     * Sets bank_transfer
     *
     * @param BankTransfer|null $bank_transfer bank_transfer
     *
     * @return self
     */
    public function setBankTransfer($bank_transfer)
    {
        if (is_null($bank_transfer)) {
            throw new SanitizedInvalidArgumentException('non-nullable bank_transfer cannot be null');
        }
        $this->container['bank_transfer'] = $bank_transfer;

        return $this;
    }

    /**
     * Gets card_detail
     *
     * @return CardDetail|null
     */
    public function getCardDetail()
    {
        return $this->container['card_detail'];
    }

    /**
     * Sets card_detail
     *
     * @param CardDetail|null $card_detail card_detail
     *
     * @return self
     */
    public function setCardDetail($card_detail)
    {
        if (is_null($card_detail)) {
            throw new SanitizedInvalidArgumentException('non-nullable card_detail cannot be null');
        }
        $this->container['card_detail'] = $card_detail;

        return $this;
    }

    /**
     * Gets pay_later
     *
     * @return PayLater|null
     */
    public function getPayLater()
    {
        return $this->container['pay_later'];
    }

    /**
     * Sets pay_later
     *
     * @param PayLater|null $pay_later pay_later
     *
     * @return self
     */
    public function setPayLater($pay_later)
    {
        if (is_null($pay_later)) {
            throw new SanitizedInvalidArgumentException('non-nullable pay_later cannot be null');
        }
        $this->container['pay_later'] = $pay_later;

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
