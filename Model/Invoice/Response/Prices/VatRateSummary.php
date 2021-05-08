<?php


namespace Mufin\IDokladBundle\Model\Invoice\Response\Prices;

use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\VatRateType;

final class VatRateSummary
{
    /**
     * @Serializer\SerializedName("TotalVat")
     * @Serializer\Type("float")
     */
    private float $totalVat;

    /**
     * @Serializer\SerializedName("TotalVatHc")
     * @Serializer\Type("float")
     */
    private float $totalVatHc;

    /**
     * @Serializer\SerializedName("TotalWithoutVat")
     * @Serializer\Type("float")
     */
    private float $totalWithoutVat;

    /**
     * @Serializer\SerializedName("TotalWithoutVatHc")
     * @Serializer\Type("float")
     */
    private float $totalWithoutVatHc;

    /**
     * @Serializer\SerializedName("TotalWithVat")
     * @Serializer\Type("float")
     */
    private float $totalWithVat;

    /**
     * @Serializer\SerializedName("TotalWithVatHc")
     * @Serializer\Type("float")
     */
    private float $totalWithVatHc;

    /**
     * @Serializer\SerializedName("VatRateType")
     * @Serializer\Type("enum<'Mufin\IDokladBundle\Factory\VatRateType'>")
     */
    private VatRateType $vatRateType;

    /**
     * @Serializer\SerializedName("TotalWithBeforeDiscount")
     * @Serializer\Type("float")
     */
    private $totalVatBeforeDiscount;


    public function getTotalVat(): float
    {
        return $this->totalVat;
    }

    public function getTotalVatBeforeDiscount(): float
    {
        return $this->totalVatBeforeDiscount;
    }

    public function getTotalVatHc(): float
    {
        return $this->totalVatHc;
    }

    public function getTotalWithoutVat(): float
    {
        return $this->totalWithoutVat;
    }

    public function getTotalWithoutVatHc(): float
    {
        return $this->totalWithoutVatHc;
    }

    public function getTotalWithVat(): float
    {
        return $this->totalWithVat;
    }

    public function getTotalWithVatHc(): float
    {
        return $this->totalWithVatHc;
    }

    /**
     * @return VatRateType
     */
    public function getVatRateType(): VatRateType
    {
        return $this->vatRateType;
    }


}