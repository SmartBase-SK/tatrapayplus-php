<?php
/**
 * TokenSuccessResponseType
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

class TokenSuccessResponseType implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;
    public const SCOPE_PREMIUM_AIS = 'PREMIUM_AIS';
    public const SCOPE_PREMIUM_PIS = 'PREMIUM_PIS';
    public const SCOPE_PREMIUM_PIS_CANC = 'PREMIUM_PIS_CANC';
    public const SCOPE_PIS = 'PIS';
    public const SCOPE_PIIS = 'PIIS';
    public const SCOPE_AIS = 'AIS';
    public const SCOPE_IDENTITY = 'IDENTITY';
    public const SCOPE_PAY_LATER = 'PAY_LATER';
    public const SCOPE_SBB_CALC = 'SBB_CALC';
    public const SCOPE_TATRAPAYPLUS = 'TATRAPAYPLUS';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'TokenSuccessResponseType';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'access_token' => 'string',
        'refresh_token' => 'string',
        'expires_in' => 'float',
        'token_type' => 'string',
        'scope' => 'string',
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
        'access_token' => null,
        'refresh_token' => null,
        'expires_in' => null,
        'token_type' => null,
        'scope' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'access_token' => false,
        'refresh_token' => false,
        'expires_in' => false,
        'token_type' => false,
        'scope' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'access_token' => 'access_token',
        'refresh_token' => 'refresh_token',
        'expires_in' => 'expires_in',
        'token_type' => 'token_type',
        'scope' => 'scope',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'access_token' => 'setAccessToken',
        'refresh_token' => 'setRefreshToken',
        'expires_in' => 'setExpiresIn',
        'token_type' => 'setTokenType',
        'scope' => 'setScope',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'access_token' => 'getAccessToken',
        'refresh_token' => 'getRefreshToken',
        'expires_in' => 'getExpiresIn',
        'token_type' => 'getTokenType',
        'scope' => 'getScope',
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
        $this->setIfExists('access_token', $data ?? [], null);
        $this->setIfExists('refresh_token', $data ?? [], null);
        $this->setIfExists('expires_in', $data ?? [], null);
        $this->setIfExists('token_type', $data ?? [], null);
        $this->setIfExists('scope', $data ?? [], null);
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

        if ($this->container['access_token'] === null) {
            $invalidProperties[] = "'access_token' can't be null";
        }
        if ($this->container['expires_in'] === null) {
            $invalidProperties[] = "'expires_in' can't be null";
        }
        if ($this->container['token_type'] === null) {
            $invalidProperties[] = "'token_type' can't be null";
        }
        $allowedValues = $this->getScopeAllowableValues();
        if (!is_null($this->container['scope']) && !in_array($this->container['scope'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'scope', must be one of '%s'",
                $this->container['scope'],
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
    public function getScopeAllowableValues()
    {
        return [
            self::SCOPE_PREMIUM_AIS,
            self::SCOPE_PREMIUM_PIS,
            self::SCOPE_PREMIUM_PIS_CANC,
            self::SCOPE_PIS,
            self::SCOPE_PIIS,
            self::SCOPE_AIS,
            self::SCOPE_IDENTITY,
            self::SCOPE_PAY_LATER,
            self::SCOPE_SBB_CALC,
            self::SCOPE_TATRAPAYPLUS,
        ];
    }

    /**
     * Gets access_token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->container['access_token'];
    }

    /**
     * Sets access_token
     *
     * @param string $access_token the access token issued by the bank authorization server
     *
     * @return self
     */
    public function setAccessToken($access_token)
    {
        if (is_null($access_token)) {
            throw new SanitizedInvalidArgumentException('non-nullable access_token cannot be null');
        }
        $this->container['access_token'] = $access_token;

        return $this;
    }

    /**
     * Gets refresh_token
     *
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->container['refresh_token'];
    }

    /**
     * Sets refresh_token
     *
     * @param string|null $refresh_token the refresh token, which can be used to obtain new access tokens
     *
     * @return self
     */
    public function setRefreshToken($refresh_token)
    {
        if (is_null($refresh_token)) {
            throw new SanitizedInvalidArgumentException('non-nullable refresh_token cannot be null');
        }
        $this->container['refresh_token'] = $refresh_token;

        return $this;
    }

    /**
     * Gets expires_in
     *
     * @return float
     */
    public function getExpiresIn()
    {
        return $this->container['expires_in'];
    }

    /**
     * Sets expires_in
     *
     * @param float $expires_in the lifetime in seconds of the access token
     *
     * @return self
     */
    public function setExpiresIn($expires_in)
    {
        if (is_null($expires_in)) {
            throw new SanitizedInvalidArgumentException('non-nullable expires_in cannot be null');
        }
        $this->container['expires_in'] = $expires_in;

        return $this;
    }

    /**
     * Gets token_type
     *
     * @return string
     */
    public function getTokenType()
    {
        return $this->container['token_type'];
    }

    /**
     * Sets token_type
     *
     * @param string $token_type The type of the token issued should be always 'Bearer'. See RFC6750 https://tools.ietf.org/html/rfc6750
     *
     * @return self
     */
    public function setTokenType($token_type)
    {
        if (is_null($token_type)) {
            throw new SanitizedInvalidArgumentException('non-nullable token_type cannot be null');
        }
        $this->container['token_type'] = $token_type;

        return $this;
    }

    /**
     * Gets scope
     *
     * @return string|null
     */
    public function getScope()
    {
        return $this->container['scope'];
    }

    /**
     * Sets scope
     *
     * @param string|null $scope the scope of the access request
     *
     * @return self
     */
    public function setScope($scope)
    {
        if (is_null($scope)) {
            throw new SanitizedInvalidArgumentException('non-nullable scope cannot be null');
        }
        $allowedValues = $this->getScopeAllowableValues();
        if (!in_array($scope, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'scope', must be one of '%s'", $scope, implode("', '", $allowedValues)));
        }
        $this->container['scope'] = $scope;

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
