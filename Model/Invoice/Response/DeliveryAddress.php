<?php


namespace Mufin\IDokladBundle\Model\Invoice\Response;

use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\Country;

final class DeliveryAddress
{
    /**
     * @Serializer\SerializedName("City")
     * @Serializer\Type("string")
     */
    private string $city;

    /**
     * @Serializer\SerializedName("ContactDeliveryAddressId")
     * @Serializer\Type("int")
     */
    private int $contactDeliveryAddressId;

    /**
     * @Serializer\SerializedName("CountryId")
     * @Serializer\Type("enum<'Mufin\IDokladBundle\Factory\Country'>")
     */
    private Country $country;

    /**
     * @Serializer\SerializedName("Name")
     * @Serializer\Type("string")
     */
    private string $name;

    /**
     * @Serializer\SerializedName("PostalCode")
     * @Serializer\Type("string")
     */
    private string $postalCode;

    /**
     * @Serializer\SerializedName("Street")
     * @Serializer\Type("string")
     */
    private string $street;

    public function getCity(): string
    {
        return $this->city;
    }

    public function getContactDeliveryAddressId(): int
    {
        return $this->contactDeliveryAddressId;
    }

    public function getCountryId(): Country
    {
        return $this->country;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }
}