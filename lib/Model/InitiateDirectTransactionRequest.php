<?php
/**
 * InitiateDirectTransactionRequest
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;


class InitiateDirectTransactionRequest implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'initiateDirectTransactionRequest';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'amount' => '\Tatrapayplus\TatrapayplusApiClient\Model\Amount',
        'end_to_end' => '\Tatrapayplus\TatrapayplusApiClient\Model\E2e',
        'is_pre_authorization' => 'bool',
        'tds_data' => '\Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionTDSData',
        'ipsp_data' => '\Tatrapayplus\TatrapayplusApiClient\Model\DirectTransactionIPSPData',
        'token' => '\Tatrapayplus\TatrapayplusApiClient\Model\Token',
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
        'amount' => null,
        'end_to_end' => null,
        'is_pre_authorization' => null,
        'tds_data' => null,
        'ipsp_data' => null,
        'token' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'amount' => false,
        'end_to_end' => false,
        'is_pre_authorization' => true,
        'tds_data' => false,
        'ipsp_data' => true,
        'token' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'amount' => 'amount',
        'end_to_end' => 'endToEnd',
        'is_pre_authorization' => 'isPreAuthorization',
        'tds_data' => 'tdsData',
        'ipsp_data' => 'ipspData',
        'token' => 'token',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'end_to_end' => 'setEndToEnd',
        'is_pre_authorization' => 'setIsPreAuthorization',
        'tds_data' => 'setTdsData',
        'ipsp_data' => 'setIpspData',
        'token' => 'setToken',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'end_to_end' => 'getEndToEnd',
        'is_pre_authorization' => 'getIsPreAuthorization',
        'tds_data' => 'getTdsData',
        'ipsp_data' => 'getIpspData',
        'token' => 'getToken',
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
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('end_to_end', $data ?? [], null);
        $this->setIfExists('is_pre_authorization', $data ?? [], null);
        $this->setIfExists('tds_data', $data ?? [], null);
        $this->setIfExists('ipsp_data', $data ?? [], null);
        $this->setIfExists('token', $data ?? [], null);
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

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        if ($this->container['end_to_end'] === null) {
            $invalidProperties[] = "'end_to_end' can't be null";
        }
        if ($this->container['tds_data'] === null) {
            $invalidProperties[] = "'tds_data' can't be null";
        }
        if ($this->container['token'] === null) {
            $invalidProperties[] = "'token' can't be null";
        }

        return $invalidProperties;
    }

    /**
     * Gets amount
     *
     * @return Amount
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param Amount $amount amount
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new SanitizedInvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets end_to_end
     *
     * @return E2e
     */
    public function getEndToEnd()
    {
        return $this->container['end_to_end'];
    }

    /**
     * Sets end_to_end
     *
     * @param E2e $end_to_end end_to_end
     *
     * @return self
     */
    public function setEndToEnd($end_to_end)
    {
        if (is_null($end_to_end)) {
            throw new SanitizedInvalidArgumentException('non-nullable end_to_end cannot be null');
        }
        $this->container['end_to_end'] = $end_to_end;

        return $this;
    }

    /**
     * Gets is_pre_authorization
     *
     * @return bool
     */
    public function getIsPreAuthorization()
    {
        return $this->container['is_pre_authorization'];
    }

    /**
     * Sets is_pre_authorization
     *
     * @param bool $is_pre_authorization is_pre_authorization
     *
     * @return self
     */
    public function setIsPreAuthorization($is_pre_authorization)
    {
        $this->container['is_pre_authorization'] = $is_pre_authorization;

        return $this;
    }

    /**
     * Gets tds_data
     *
     * @return DirectTransactionTDSData
     */
    public function getTdsData()
    {
        return $this->container['tds_data'];
    }

    /**
     * Sets tds_data
     *
     * @param DirectTransactionTDSData $tds_data tds_data
     *
     * @return self
     */
    public function setTdsData($tds_data)
    {
        if (is_null($tds_data)) {
            throw new SanitizedInvalidArgumentException('non-nullable tds_data cannot be null');
        }
        $this->container['tds_data'] = $tds_data;

        return $this;
    }

    /**
     * Gets ipsp_data
     *
     * @return DirectTransactionIPSPData
     */
    public function getIpspData()
    {
        return $this->container['ipsp_data'];
    }

    /**
     * Sets ipsp_data
     *
     * @param DirectTransactionIPSPData $ipsp_data tds_data
     *
     * @return self
     */
    public function setIpspData($ipsp_data)
    {
        $this->container['ipsp_data'] = $ipsp_data;

        return $this;
    }

    /**
     * Gets token
     *
     * @return Token
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param Token $token token
     *
     * @return self
     */
    public function setToken($token)
    {
        if (is_null($token)) {
            throw new SanitizedInvalidArgumentException('non-nullable token cannot be null');
        }
        $this->container['token'] = $token;

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
