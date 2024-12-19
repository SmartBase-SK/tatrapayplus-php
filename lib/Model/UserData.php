<?php
/**
 * UserData
 *
 * PHP version 7.4
 *
 * @category Class
 */

namespace Tatrapayplus\TatrapayplusApiClient\Model;

use Tatrapayplus\TatrapayplusApiClient\ObjectSerializer;

class UserData implements ModelInterface, \ArrayAccess
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'userData';

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'external_applicant_id' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
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
        'external_applicant_id' => null,
        'first_name' => null,
        'last_name' => null,
        'email' => 'email',
        'phone' => null,
    ];

    /**
     * Array of nullable properties. Used for (de)serialization
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'external_applicant_id' => false,
        'first_name' => false,
        'last_name' => false,
        'email' => false,
        'phone' => false,
    ];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'external_applicant_id' => 'externalApplicantId',
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'email' => 'email',
        'phone' => 'phone',
    ];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'external_applicant_id' => 'setExternalApplicantId',
        'first_name' => 'setFirstName',
        'last_name' => 'setLastName',
        'email' => 'setEmail',
        'phone' => 'setPhone',
    ];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'external_applicant_id' => 'getExternalApplicantId',
        'first_name' => 'getFirstName',
        'last_name' => 'getLastName',
        'email' => 'getEmail',
        'phone' => 'getPhone',
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
        $this->setIfExists('external_applicant_id', $data ?? [], null);
        $this->setIfExists('first_name', $data ?? [], null);
        $this->setIfExists('last_name', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('phone', $data ?? [], null);
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
	    if(!array_key_exists($variableName, $fields)) {
		    $this->container[$variableName] = $defaultValue;
			return;
	    }
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

		$value = $fields[$variableName] ?? $defaultValue;
	    call_user_func( array($this, $this->setters()[$variableName]), $value );
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

        if (!is_null($this->container['external_applicant_id']) && (mb_strlen($this->container['external_applicant_id']) > 255)) {
            $invalidProperties[] = "invalid value for 'external_applicant_id', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['external_applicant_id']) && (mb_strlen($this->container['external_applicant_id']) < 1)) {
            $invalidProperties[] = "invalid value for 'external_applicant_id', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['first_name'] === null) {
            $invalidProperties[] = "'first_name' can't be null";
        }
        if (mb_strlen($this->container['first_name']) > 30) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be smaller than or equal to 30.";
        }

        if (mb_strlen($this->container['first_name']) < 1) {
            $invalidProperties[] = "invalid value for 'first_name', the character length must be bigger than or equal to 1.";
        }

        if (!preg_match('/^[a-zA-Z0-9À-ž ]{1,30}$/', $this->container['first_name'])) {
            $invalidProperties[] = "invalid value for 'first_name', must be conform to the pattern /^[a-zA-Z0-9À-ž ]{1,30}$/.";
        }

        if ($this->container['last_name'] === null) {
            $invalidProperties[] = "'last_name' can't be null";
        }
        if (mb_strlen($this->container['last_name']) > 30) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be smaller than or equal to 30.";
        }

        if (mb_strlen($this->container['last_name']) < 1) {
            $invalidProperties[] = "invalid value for 'last_name', the character length must be bigger than or equal to 1.";
        }

        if (!preg_match('/^[a-zA-Z0-9À-ž ]{1,30}$/', $this->container['last_name'])) {
            $invalidProperties[] = "invalid value for 'last_name', must be conform to the pattern /^[a-zA-Z0-9À-ž ]{1,30}$/.";
        }

        if (!is_null($this->container['email']) && (mb_strlen($this->container['email']) > 50)) {
            $invalidProperties[] = "invalid value for 'email', the character length must be smaller than or equal to 50.";
        }

        if (!is_null($this->container['phone']) && !preg_match('/\\+(9[976]\\d|8[987530]\\d|6[987]\\d|5[90]\\d|42\\d|3[875]\\d|2[98654321]\\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\\d{1,14}$/', $this->container['phone'])) {
            $invalidProperties[] = "invalid value for 'phone', must be conform to the pattern /\\+(9[976]\\d|8[987530]\\d|6[987]\\d|5[90]\\d|42\\d|3[875]\\d|2[98654321]\\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\\d{1,14}$/.";
        }

        return $invalidProperties;
    }

    /**
     * Gets external_applicant_id
     *
     * @return string|null
     */
    public function getExternalApplicantId()
    {
        return $this->container['external_applicant_id'];
    }

    /**
     * Sets external_applicant_id
     *
     * @param string|null $external_applicant_id External applicant ID, could be generated by application
     *
     * @return self
     */
    public function setExternalApplicantId($external_applicant_id)
    {
        if (is_null($external_applicant_id)) {
            throw new SanitizedInvalidArgumentException('non-nullable external_applicant_id cannot be null');
        }
        if (mb_strlen($external_applicant_id) > 255) {
            throw new SanitizedInvalidArgumentException('invalid length for $external_applicant_id when calling UserData., must be smaller than or equal to 255.');
        }
        if (mb_strlen($external_applicant_id) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $external_applicant_id when calling UserData., must be bigger than or equal to 1.');
        }

        $this->container['external_applicant_id'] = $external_applicant_id;

        return $this;
    }

    /**
     * Gets first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->container['first_name'];
    }

    /**
     * Sets first_name
     *
     * @param string $first_name first_name
     *
     * @return self
     */
    public function setFirstName($first_name)
    {
        if (is_null($first_name)) {
            throw new SanitizedInvalidArgumentException('non-nullable first_name cannot be null');
        }
        if (mb_strlen($first_name) > 30) {
            throw new SanitizedInvalidArgumentException('invalid length for $first_name when calling UserData., must be smaller than or equal to 30.');
        }
        if (mb_strlen($first_name) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $first_name when calling UserData., must be bigger than or equal to 1.');
        }
	    $first_name = preg_replace('/[^a-zA-Z0-9À-ž ]+/', '', ObjectSerializer::toString($first_name));

        $this->container['first_name'] = $first_name;

        return $this;
    }

    /**
     * Gets last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->container['last_name'];
    }

    /**
     * Sets last_name
     *
     * @param string $last_name last_name
     *
     * @return self
     */
    public function setLastName($last_name)
    {
        if (is_null($last_name)) {
            throw new SanitizedInvalidArgumentException('non-nullable last_name cannot be null');
        }
        if (mb_strlen($last_name) > 30) {
            throw new SanitizedInvalidArgumentException('invalid length for $last_name when calling UserData., must be smaller than or equal to 30.');
        }
        if (mb_strlen($last_name) < 1) {
            throw new SanitizedInvalidArgumentException('invalid length for $last_name when calling UserData., must be bigger than or equal to 1.');
        }
	    $last_name = preg_replace('/[^a-zA-Z0-9À-ž ]+/', '', ObjectSerializer::toString($last_name));

        $this->container['last_name'] = $last_name;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email Conditionally mandatory.It is mandatory only if the phone attribute is not provided. If the email is not provided, the user will not receive the cardPay notification and payLater will ask for the email in the app.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new SanitizedInvalidArgumentException('non-nullable email cannot be null');
        }
        if (mb_strlen($email) > 50) {
            throw new SanitizedInvalidArgumentException('invalid length for $email when calling UserData., must be smaller than or equal to 50.');
        }

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
     * @param string|null $phone Conditionally mandatory.It is mandatory only if the email attribute is not provided.
     *
     * @return self
     */
    public function setPhone($phone)
    {
        if (is_null($phone)) {
            throw new SanitizedInvalidArgumentException('non-nullable phone cannot be null');
        }

        if (!preg_match('/\\+(9[976]\\d|8[987530]\\d|6[987]\\d|5[90]\\d|42\\d|3[875]\\d|2[98654321]\\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\\d{1,14}$/', ObjectSerializer::toString($phone))) {
            throw new SanitizedInvalidArgumentException('invalid value for $phone when calling UserData., must conform to the pattern /\\+(9[976]\\d|8[987530]\\d|6[987]\\d|5[90]\\d|42\\d|3[875]\\d|2[98654321]\\d|9[8543210]|8[6421]|6[6543210]|5[87654321]|4[987654310]|3[9643210]|2[70]|7|1)\\d{1,14}$/.');
        }

        $this->container['phone'] = $phone;

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
