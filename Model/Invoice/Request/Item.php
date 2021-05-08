<?php


namespace Mufin\IDokladBundle\Model\Invoice\Request;


use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\ItemType;
use Mufin\IDokladBundle\Factory\PriceType;
use Mufin\IDokladBundle\Factory\VatRateType;

final class Item
{
    /**
     * @Serializer\SerializedName("Amount")
     */
    private float $amount;

    /**
     * @Serializer\SerializedName("Code")
     */
    private ?string $code = null;

    /**
     * @Serializer\SerializedName("DiscountName")
     */
    private ?string $discountName = null;

    /**
     * @Serializer\SerializedName("DiscountPercentage")
     */
    private float $discountPercentage;

    /**
     * @Serializer\SerializedName("IsTaxMovement")
     */
    private bool $isTaxMovement;

    /**
     * @Serializer\SerializedName("ItemType")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\ItemType>")
     */
    private ?ItemType $itemType = null;

    /**
     * @Serializer\SerializedName("Name")
     */
    private string $name;

    /**
     * @Serializer\SerializedName("PriceListItemId")
     */
    private ?int $priceListItemId = null;

    /**
     * @Serializer\SerializedName("PriceType")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\PriceType>")
     */
    private PriceType $priceType;

    /**
     * @Serializer\SerializedName("Unit")
     */
    private ?string $unit = null;

    /**
     * @Serializer\SerializedName("UnitPrice")
     */
    private float $unitPrice;

    /**
     * @Serializer\SerializedName("VatCodeId")
     */
    private ?int $vatCodeId = null;

    /**
     * @Serializer\SerializedName("VatRateType")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\VatRateType>")
     */
    private VatRateType $vatRateType;

    public function __construct(
        float $amount,
        float $discountPercentage,
        bool $isTaxMovement,
        string $name,
        PriceType $priceType,
        float $unitPrice,
        VatRateType $vatRateType
    ) {
        $this->amount = $amount;
        $this->discountPercentage = $discountPercentage;
        $this->isTaxMovement = $isTaxMovement;
        $this->name = $name;
        $this->priceType = $priceType;
        $this->unitPrice = $unitPrice;
        $this->vatRateType = $vatRateType;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }
    public function getDiscountName(): ?string
    {
        return $this->discountName;
    }

    public function setDiscountName(?string $discountName): self
    {
        $this->discountName = $discountName;

        return $this;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }

    public function isTaxMovement(): bool
    {
        return $this->isTaxMovement;
    }

    public function getItemType(): ItemType
    {
        return $this->itemType;
    }

    public function setItemType(?ItemType $itemType): self
    {
        $this->itemType = $itemType;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPriceListItemId(): ?int
    {
        return $this->priceListItemId;
    }

    public function setPriceListItemId(?int $priceListItemId): self
    {
        $this->priceListItemId = $priceListItemId;
        return $this;
    }

    public function getPriceType(): PriceType
    {
        return $this->priceType;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function getVatCodeId(): ?int
    {
        return $this->vatCodeId;
    }

    public function setVatCodeId(?int $vatCodeId): self
    {
        $this->vatCodeId = $vatCodeId;

        return $this;
    }

    public function getVatRateType(): VatRateType
    {
        return $this->vatRateType;
    }
}