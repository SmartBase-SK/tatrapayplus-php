<?php
/**
 * CardDetail
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class CardDetail implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;
    public const CARD_PAY_LANG_OVERRIDE_SK = 'SK';
    public const CARD_PAY_LANG_OVERRIDE_EN = 'EN';
    public const CARD_PAY_LANG_OVERRIDE_DE = 'DE';
    public const CARD_PAY_LANG_OVERRIDE_HU = 'HU';
    public const CARD_PAY_LANG_OVERRIDE_CZ = 'CZ';
    public const CARD_PAY_LANG_OVERRIDE_ES = 'ES';
    public const CARD_PAY_LANG_OVERRIDE_FR = 'FR';
    public const CARD_PAY_LANG_OVERRIDE_IT = 'IT';
    public const CARD_PAY_LANG_OVERRIDE_PL = 'PL';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'cardDetail';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'card_pay_lang_override' => 'string',
        'is_pre_authorization' => 'bool',
        'card_holder' => 'string',
        'billing_address' => '\Tatrapayplus\TatrapayplusApiClient\Model\Address',
        'shipping_address' => '\Tatrapayplus\TatrapayplusApiClient\Model\Address',
        'comfort_pay' => '\Tatrapayplus\TatrapayplusApiClient\Model\CardIdentifierOrRegister',
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
        'card_pay_lang_override' => null,
        'is_pre_authorization' => null,
        'card_holder' => null,
        'billing_address' => null,
        'shipping_address' => null,
        'comfort_pay' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'card_pay_lang_override' => false,
        'is_pre_authorization' => false,
        'card_holder' => false,
        'billing_address' => false,
        'shipping_address' => false,
        'comfort_pay' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'card_pay_lang_override' => 'cardPayLangOverride',
        'is_pre_authorization' => 'isPreAuthorization',
        'card_holder' => 'cardHolder',
        'billing_address' => 'billingAddress',
        'shipping_address' => 'shippingAddress',
        'comfort_pay' => 'comfortPay',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'card_pay_lang_override' => 'setCardPayLangOverride',
        'is_pre_authorization' => 'setIsPreAuthorization',
        'card_holder' => 'setCardHolder',
        'billing_address' => 'setBillingAddress',
        'shipping_address' => 'setShippingAddress',
        'comfort_pay' => 'setComfortPay',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'card_pay_lang_override' => 'getCardPayLangOverride',
        'is_pre_authorization' => 'getIsPreAuthorization',
        'card_holder' => 'getCardHolder',
        'billing_address' => 'getBillingAddress',
        'shipping_address' => 'getShippingAddress',
        'comfort_pay' => 'getComfortPay',
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
        $this->setIfExists('card_pay_lang_override', $data ?? [], null);
        $this->setIfExists('is_pre_authorization', $data ?? [], null);
        $this->setIfExists('card_holder', $data ?? [], null);
        $this->setIfExists('billing_address', $data ?? [], null);
        $this->setIfExists('shipping_address', $data ?? [], null);
        $this->setIfExists('comfort_pay', $data ?? [], null);
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

        $allowedValues = $this->getCardPayLangOverrideAllowableValues();
        if (!is_null($this->container['card_pay_lang_override']) && !in_array($this->container['card_pay_lang_override'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'card_pay_lang_override', must be one of '%s'",
                $this->container['card_pay_lang_override'],
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['card_holder'] === null) {
            $invalidProperties[] = "'card_holder' can't be null";
        }
        if (mb_strlen($this->container['card_holder']) > 45) {
            $invalidProperties[] = "invalid value for 'card_holder', the character length must be smaller than or equal to 45.";
        }

        if (mb_strlen($this->container['card_holder']) < 2) {
            $invalidProperties[] = "invalid value for 'card_holder', the character length must be bigger than or equal to 2.";
        }

        if (!preg_match('/^[ 0-9a-zA-Z.@_-]{2,45}$/', $this->container['card_holder'])) {
            $invalidProperties[] = "invalid value for 'card_holder', must be conform to the pattern /^[ 0-9a-zA-Z.@_-]{2,45}$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getCardPayLangOverrideAllowableValues()
    {
        return [
            self::CARD_PAY_LANG_OVERRIDE_SK,
            self::CARD_PAY_LANG_OVERRIDE_EN,
            self::CARD_PAY_LANG_OVERRIDE_DE,
            self::CARD_PAY_LANG_OVERRIDE_HU,
            self::CARD_PAY_LANG_OVERRIDE_CZ,
            self::CARD_PAY_LANG_OVERRIDE_ES,
            self::CARD_PAY_LANG_OVERRIDE_FR,
            self::CARD_PAY_LANG_OVERRIDE_IT,
            self::CARD_PAY_LANG_OVERRIDE_PL,
        ];
    }

    /**
     * Gets card_pay_lang_override
     *
     * @return string|null
     */
    public function getCardPayLangOverride()
    {
        return $this->container['card_pay_lang_override'];
    }

    /**
     * Sets card_pay_lang_override
     *
     * @param string|null $card_pay_lang_override It is possible to override the accept-language header for the CardPay payment method. This override only affects CardPay itself, not the whole TatraPayPlus service.  If it is empty , then accept-language is taken into account
     *
     * @return self
     */
    public function setCardPayLangOverride($card_pay_lang_override)
    {
        if (is_null($card_pay_lang_override)) {
            throw new SanitizedInvalidArgumentException('non-nullable card_pay_lang_override cannot be null');
        }
        $allowedValues = $this->getCardPayLangOverrideAllowableValues();
        if (!in_array($card_pay_lang_override, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'card_pay_lang_override', must be one of '%s'", $card_pay_lang_override, implode("', '", $allowedValues)));
        }
        $this->container['card_pay_lang_override'] = $card_pay_lang_override;

        return $this;
    }

    /**
     * Gets is_pre_authorization
     *
     * @return bool|null
     */
    public function getIsPreAuthorization()
    {
        return $this->container['is_pre_authorization'];
    }

    /**
     * Sets is_pre_authorization
     *
     * @param bool|null $is_pre_authorization If true - pre-authorization transaction
     *
     * @return self
     */
    public function setIsPreAuthorization($is_pre_authorization)
    {
        if (is_null($is_pre_authorization)) {
            throw new SanitizedInvalidArgumentException('non-nullable is_pre_authorization cannot be null');
        }
        $this->container['is_pre_authorization'] = $is_pre_authorization;

        return $this;
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
     * @param string $card_holder Unstructured remittance information. At present, Tatrabanka bank transfer does not display the remittance information.
     *
     * @return self
     */
    public function setCardHolder($card_holder)
    {
        if (is_null($card_holder)) {
            throw new SanitizedInvalidArgumentException('non-nullable card_holder cannot be null');
        }
        if (mb_strlen($card_holder) > 45) {
            throw new SanitizedInvalidArgumentException('invalid length for $card_holder when calling CardDetail., must be smaller than or equal to 45.');
        }
        if (mb_strlen($card_holder) < 2) {
            throw new SanitizedInvalidArgumentException('invalid length for $card_holder when calling CardDetail., must be bigger than or equal to 2.');
        }
        if (!preg_match('/^[ 0-9a-zA-Z.@_-]{2,45}$/', ObjectSerializer::toString($card_holder))) {
            throw new SanitizedInvalidArgumentException('invalid value for $card_holder when calling CardDetail., must conform to the pattern /^[ 0-9a-zA-Z.@_-]{2,45}$/.');
        }

        $this->container['card_holder'] = $card_holder;

        return $this;
    }

    /**
     * Gets billing_address
     *
     * @return Address|null
     */
    public function getBillingAddress()
    {
        return $this->container['billing_address'];
    }

    /**
     * Sets billing_address
     *
     * @param Address|null $billing_address billing_address
     *
     * @return self
     */
    public function setBillingAddress($billing_address)
    {
        if (is_null($billing_address)) {
            throw new SanitizedInvalidArgumentException('non-nullable billing_address cannot be null');
        }
        $this->container['billing_address'] = $billing_address;

        return $this;
    }

    /**
     * Gets shipping_address
     *
     * @return Address|null
     */
    public function getShippingAddress()
    {
        return $this->container['shipping_address'];
    }

    /**
     * Sets shipping_address
     *
     * @param Address|null $shipping_address shipping_address
     *
     * @return self
     */
    public function setShippingAddress($shipping_address)
    {
        if (is_null($shipping_address)) {
            throw new SanitizedInvalidArgumentException('non-nullable shipping_address cannot be null');
        }
        $this->container['shipping_address'] = $shipping_address;

        return $this;
    }

    /**
     * Gets comfort_pay
     *
     * @return CardIdentifierOrRegister|null
     */
    public function getComfortPay()
    {
        return $this->container['comfort_pay'];
    }

    /**
     * Sets comfort_pay
     *
     * @param CardIdentifierOrRegister|null $comfort_pay comfort_pay
     *
     * @return self
     */
    public function setComfortPay($comfort_pay)
    {
        if (is_null($comfort_pay)) {
            throw new SanitizedInvalidArgumentException('non-nullable comfort_pay cannot be null');
        }
        $this->container['comfort_pay'] = $comfort_pay;

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
