<?php
/**
 * PaymentIntentStatusResponse
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class PaymentIntentStatusResponse implements ModelInterface, \ArrayAccess
{
    public const SIMPLE_STATUS_ACCEPTED = 'ACCEPTED';
    public const SIMPLE_STATUS_PENDING = 'PENDING';
    public const SIMPLE_STATUS_REJECTED = 'REJECTED';

    public const SIMPLE_STATUS_MAP = array(
        PaymentMethod::PAY_LATER => array(
            self::SIMPLE_STATUS_ACCEPTED => [PayLaterStatus::LOAN_APPLICATION_FINISHED, PayLaterStatus::LOAN_DISBURSED],
            self::SIMPLE_STATUS_REJECTED => [PayLaterStatus::CANCELED, PayLaterStatus::EXPIRED],
        ),
        PaymentMethod::CARD_PAY => array(
            self::SIMPLE_STATUS_ACCEPTED => [CardPayStatus::OK, CardPayStatus::CB],
            self::SIMPLE_STATUS_REJECTED => [CardPayStatus::FAIL],
        ),
        PaymentMethod::BANK_TRANSFER => array(
            self::SIMPLE_STATUS_ACCEPTED => [BankTransferStatus::ACCC, BankTransferStatus::ACSC],
            self::SIMPLE_STATUS_REJECTED => [BankTransferStatus::CANC, BankTransferStatus::RJCT],
        ),
        PaymentMethod::QR_PAY => array(
            self::SIMPLE_STATUS_ACCEPTED => [QRStatus::ACCC],
            self::SIMPLE_STATUS_REJECTED => [QRStatus::EXPIRED],
        ),
    );

    public const DISCRIMINATOR = null;
    public const AUTHORIZATION_STATUS__NEW = 'NEW';
    public const AUTHORIZATION_STATUS_PAY_METHOD_SELECTED = 'PAY_METHOD_SELECTED';
    public const AUTHORIZATION_STATUS_AUTH_DONE = 'AUTH_DONE';
    public const AUTHORIZATION_STATUS_AUTH_FAILED = 'AUTH_FAILED';
    public const AUTHORIZATION_STATUS_EXPIRED = 'EXPIRED';
    public const AUTHORIZATION_STATUS_CANCELLED_BY_TPP = 'CANCELLED_BY_TPP';
    public const AUTHORIZATION_STATUS_CANCELLED_BY_USER = 'CANCELLED_BY_USER';
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'paymentIntentStatusResponse';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'selected_payment_method' => '\Tatrapayplus\TatrapayplusApiClient\Model\PaymentMethod',
        'authorization_status' => 'string',
        'status' => 'mixed',
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
        'selected_payment_method' => null,
        'authorization_status' => null,
        'status' => null,
    ];
    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'selected_payment_method' => false,
        'authorization_status' => false,
        'status' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'selected_payment_method' => 'selectedPaymentMethod',
        'authorization_status' => 'authorizationStatus',
        'status' => 'status',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'selected_payment_method' => 'setSelectedPaymentMethod',
        'authorization_status' => 'setAuthorizationStatus',
        'status' => 'setStatus',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'selected_payment_method' => 'getSelectedPaymentMethod',
        'authorization_status' => 'getAuthorizationStatus',
        'status' => 'getStatus',
        'simple_status' => 'getSimpleStatus',
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
        $this->setIfExists('selected_payment_method', $data ?? [], null);
        $this->setIfExists('authorization_status', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
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

        if ($this->container['authorization_status'] === null) {
            $invalidProperties[] = "'authorization_status' can't be null";
        }
        $allowedValues = $this->getAuthorizationStatusAllowableValues();
        if (!is_null($this->container['authorization_status']) && !in_array($this->container['authorization_status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'authorization_status', must be one of '%s'",
                $this->container['authorization_status'],
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
    public function getAuthorizationStatusAllowableValues()
    {
        return [
            self::AUTHORIZATION_STATUS__NEW,
            self::AUTHORIZATION_STATUS_PAY_METHOD_SELECTED,
            self::AUTHORIZATION_STATUS_AUTH_DONE,
            self::AUTHORIZATION_STATUS_AUTH_FAILED,
            self::AUTHORIZATION_STATUS_EXPIRED,
            self::AUTHORIZATION_STATUS_CANCELLED_BY_TPP,
            self::AUTHORIZATION_STATUS_CANCELLED_BY_USER,
        ];
    }

    /**
     * Sets selected_payment_method
     *
     * @param PaymentMethod|null $selected_payment_method selected_payment_method
     *
     * @return self
     */
    public function setSelectedPaymentMethod($selected_payment_method)
    {
        if (is_null($selected_payment_method)) {
            throw new SanitizedInvalidArgumentException('non-nullable selected_payment_method cannot be null');
        }
        $this->container['selected_payment_method'] = $selected_payment_method;

        return $this;
    }

    /**
     * Gets authorization_status
     *
     * @return string
     */
    public function getAuthorizationStatus()
    {
        return $this->container['authorization_status'];
    }

    /**
     * Sets authorization_status
     *
     * @param string $authorization_status Status of payment intent authorization progress. Be aware, It doesnt indicate payment status! To get payment status see attribute status.
     *
     * @return self
     */
    public function setAuthorizationStatus($authorization_status)
    {
        if (is_null($authorization_status)) {
            throw new SanitizedInvalidArgumentException('non-nullable authorization_status cannot be null');
        }
        $allowedValues = $this->getAuthorizationStatusAllowableValues();
        if (!in_array($authorization_status, $allowedValues, true)) {
            throw new SanitizedInvalidArgumentException(sprintf("Invalid value '%s' for 'authorization_status', must be one of '%s'", $authorization_status, implode("', '", $allowedValues)));
        }
        $this->container['authorization_status'] = $authorization_status;

        return $this;
    }

    /**
     * Gets status
     *
     * @return CardPayStatusStructure|BankTransferStatus|PayLaterStatus|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new SanitizedInvalidArgumentException('non-nullable status cannot be null');
        }

        $selected_method = $this->getSelectedPaymentMethod();

        if ($selected_method == PaymentMethod::CARD_PAY) {
            $type = '\Tatrapayplus\TatrapayplusApiClient\Model\CardPayStatusStructure';
            $value = ObjectSerializer::deserialize($status, $type, null);
        } elseif ($selected_method == PaymentMethod::BANK_TRANSFER) {
            $value = new BankTransferStatus();
            $value->setStatus($status);
        } elseif ($selected_method == PaymentMethod::PAY_LATER) {
            $value = new PayLaterStatus();
            $value->setStatus($status);
        } elseif ($selected_method == PaymentMethod::QR_PAY) {
	        $value = new QRStatus();
	        $value->setStatus($status);
        }
        $this->container['status'] = $value;

        $this ->setSimpleStatus(self::SIMPLE_STATUS_PENDING);
        foreach (self::SIMPLE_STATUS_MAP[$selected_method] as $simple_status => $gateway_statuses) {
            if (in_array($status, $gateway_statuses)) {
                $this->setSimpleStatus($simple_status);
                break;
            }
        }

        return $this;
    }

    /**
     * Gets simple_status
     *
     * @return string
     */
    public function getSimpleStatus()
    {
        return $this->container['simple_status'] ?? self::SIMPLE_STATUS_PENDING;
    }

    /**
     * Sets simple_status
     *
     * @param string|null $simple_status simple_status
     *
     * @return self
     */
    public function setSimpleStatus($simple_status)
    {
        if (is_null($simple_status)) {
            throw new SanitizedInvalidArgumentException('non-nullable simple_status cannot be null');
        }
        $this->container['simple_status'] = $simple_status;

        return $this;
    }

    /**
     * Gets selected_payment_method
     *
     * @return PaymentMethod|null
     */
    public function getSelectedPaymentMethod()
    {
        return $this->container['selected_payment_method'];
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
