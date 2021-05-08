<?php

namespace Mufin\IDokladBundle\Model\Invoice\Response;

use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Model\Invoice\Response\Prices\VatRateSummary;

final class Prices
{
    /**
     * @Serializer\SerializedName("TotalDiscountAmount")
     * @Serializer\Type("float")
     */
    private float $totalDiscountAmount;

    /**
     * @Serializer\SerializedName("TotalPaid")
     * @Serializer\Type("float")
     */
    private float $totalPaid;

    /**
     * @Serializer\SerializedName("TotalPaidHc")
     * @Serializer\Type("float")
     */
    private float $totalPaidHc;

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
     * @Serializer\SerializedName("TotalWithoutDiscount")
     * @Serializer\Type("float")
     */
    private float $totalWithoutDiscount;

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
     * @Serializer\SerializedName("VatRateSummary")
     * @Serializer\Type("Mufin\IDokladBundle\Model\Invoice\Response\Prices\VatRateSummary")
     */
    private VatRateSummary $vatRateSummary;

    public function getTotalDiscountAmount(): float
    {
        return $this->totalDiscountAmount;
    }

    public function getTotalPaid(): float
    {
        return $this->totalPaid;
    }

    public function getTotalPaidHc(): float
    {
        return $this->totalPaidHc;
    }

    public function getTotalVat(): float
    {
        return $this->totalVat;
    }

    public function getTotalVatHc(): float
    {
        return $this->totalVatHc;
    }

    public function getTotalWithoutDiscount(): float
    {
        return $this->totalWithoutDiscount;
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

    public function getVatRateSummary(): VatRateSummary
    {
        return $this->vatRateSummary;
    }
}