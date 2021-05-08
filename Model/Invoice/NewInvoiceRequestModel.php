<?php


namespace Mufin\IDokladBundle\Model\Invoice;

use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\Currency;
use Mufin\IDokladBundle\Factory\EetResponsibility;
use Mufin\IDokladBundle\Factory\PaymentOption;
use Mufin\IDokladBundle\Factory\ReportLanguage;
use Mufin\IDokladBundle\Factory\VatOnPayStatus;
use Mufin\IDokladBundle\Helper\BundleRequestInterface;
use Mufin\IDokladBundle\Model\Contact\ContactResponse;
use Mufin\IDokladBundle\Model\Invoice\Request\Item;
use Symfony\Component\HttpFoundation\Request;

class NewInvoiceRequestModel implements BundleRequestInterface
{
    private const HTTP_METHOD = Request::METHOD_POST;
    private const ENDPOINT = 'IssuedInvoices';
    private const RESPONSE_CLASS = NewInvoiceResponseModel::class;

    /**
     * @Serializer\SerializedName("AccountNumber")
     */
    private ?string $accountNumber = null;

    /**
     * @Serializer\SerializedName("BankId")
     */
    private ?int $bankId = null;

    /**
     * @Serializer\SerializedName("ConstantSymbolId")
     */
    private ?int $constantSymbolId = null;

    /**
     * @Serializer\SerializedName("CurrencyId")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\Currency>")
     */
    private Currency $currency;

    /**
     * @Serializer\SerializedName("DateOfIssue")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     */
    private \DateTimeInterface $dateOfIssue;

    /**
     * @Serializer\SerializedName("DateOfMaturity")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     */
    private \DateTimeInterface $dateOfMaturity;

    /**
     * @Serializer\SerializedName("DateOfPayment")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     */
    private ?\DateTimeInterface $dateOfPayment = null;

    /**
     * @Serializer\SerializedName("DateOfTaxing")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     */
    private \DateTimeInterface $dateOfTaxing;

    /**
     * @Serializer\SerializedName("DateOfVatApplication")
     * @Serializer\Type("DateTimeInterface<'Y-m-d'>")
     */
    private ?\DateTimeInterface $dateOfVatApplication = null;

    /**
     * @Serializer\SerializedName("DeliveryAddressId")
     */
    private ?int $deliveryAddressId = null;

    /**
     * @Serializer\SerializedName("Description")
     */
    private string $description;

    /**
     * @Serializer\SerializedName("DiscountPercentage")
     */
    private ?float $discountPercentage = null;

    /**
     * @Serializer\SerializedName("DocumentSerialNumber")
     */
    private int $documentSerialNumber;

    /**
     * @Serializer\SerializedName("EetResponsibility")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\EetResponsibility>")
     */
    private ?EetResponsibility $eetResponsibility = null;

    /**
     * @Serializer\SerializedName("ExchangeRate")
     */
    private ?float $exchangeRate = null;

    /**
     * @Serializer\SerializedName("ExchangeRateAmount")
     */
    private ?float $exchangeRateAmount = null;

    /**
     * @Serializer\SerializedName("Iban")
     */
    private ?string $iban = null;

    /**
     * @Serializer\SerializedName("IsEet")
     */
    private bool $isEet;

    /**
     * @Serializer\SerializedName("IsIncomeTax")
     */
    private bool $isIncomeTax;

    /**
     * @Serializer\SerializedName("Items")
     *
     * @var array<int, Item>
     */
    private array $items = [];

    /**
     * @Serializer\SerializedName("ItemsTextPrefix")
     */
    private ?string $itemsTextPrefix = null;

    /**
     * @Serializer\SerializedName("ItemsTextSuffix")
     */
    private ?string $itemsTextSuffix = null;

    /**
     * @Serializer\SerializedName("Note")
     */
    private ?string $note = null;

    /**
     * @Serializer\SerializedName("NumericSequenceId")
     */
    private int $numericSequenceId;

    /**
     * @Serializer\SerializedName("OrderNumber")
     */
    private ?string $orderNumber = null;

    /**
     * @Serializer\SerializedName("PartnerId")
     */
    private int $partnerId;

    /**
     * @Serializer\SerializedName("PaymentOptionId")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\PaymentOption>")
     */
    private PaymentOption $paymentOption;

    /**
     * @Serializer\SerializedName("ProformaInvoices")
     *
     * @var array<int>|null
     */
    private ?array $proformaInvoices = null;

    /**
     * @Serializer\SerializedName("ReportLanguage")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\ReportLanguage>")
     */
    private ?ReportLanguage $reportLanguage = null;

    /**
     * @Serializer\SerializedName("SalesOrderId")
     */
    private ?int $salesOrderId = null;

    /**
     * @Serializer\SerializedName("SalesPosEquipmentId")
     */
    private ?int $salesPosEquipmentId = null;

    /**
     * @Serializer\SerializedName("Swift")
     */
    private ?string $swift = null;

    /**
     * @Serializer\SerializedName("Tags")
     *
     * @var array<int>|null
     */
    private ?array $tags = null;

    /**
     * @Serializer\SerializedName("VariableSymbol")
     */
    private ?string $variableSymbol = null;

    /**
     * @Serializer\SerializedName("VatOnPayStatus")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\VatOnPayStatus>")
     */
    private ?VatOnPayStatus $vatOnPayStatus = null;

    /**
     * @Serializer\SerializedName("VatReverseChargeCodeId")
     */
    private ?int $vatReverseChargeCodeId = null;

    public function __construct(
        Currency $currency,
        \DateTimeInterface $dateOfIssue,
        \DateTimeInterface $dateOfMaturity,
        \DateTimeInterface $dateOfTaxing,
        string $description,
        int $documentSerialNumber,
        bool $isEet,
        bool $isIncomeTax,
        array $items,
        int $numericSequenceId,
        int $partnerId,
        PaymentOption $paymentOption
    )
    {
        $this->currency = $currency;
        $this->dateOfIssue = $dateOfIssue;
        $this->dateOfMaturity = $dateOfMaturity;
        $this->dateOfTaxing = $dateOfTaxing;
        $this->description = $description;
        $this->documentSerialNumber = $documentSerialNumber;
        $this->isEet = $isEet;
        $this->isIncomeTax = $isIncomeTax;
        $this->items = $items;
        $this->numericSequenceId = $numericSequenceId;
        $this->partnerId = $partnerId;
        $this->paymentOption = $paymentOption;
    }


    /**
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @return int|null
     */
    public function getBankId(): ?int
    {
        return $this->bankId;
    }

    /**
     * @return int|null
     */
    public function getConstantSymbolId(): ?int
    {
        return $this->constantSymbolId;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfIssue(): \DateTimeInterface
    {
        return $this->dateOfIssue;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfMaturity(): \DateTimeInterface
    {
        return $this->dateOfMaturity;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateOfPayment(): ?\DateTimeInterface
    {
        return $this->dateOfPayment;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfTaxing(): \DateTimeInterface
    {
        return $this->dateOfTaxing;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateOfVatApplication(): ?\DateTimeInterface
    {
        return $this->dateOfVatApplication;
    }

    /**
     * @return int|null
     */
    public function getDeliveryAddressId(): ?int
    {
        return $this->deliveryAddressId;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float|null
     */
    public function getDiscountPercentage(): ?float
    {
        return $this->discountPercentage;
    }

    /**
     * @return int
     */
    public function getDocumentSerialNumber(): int
    {
        return $this->documentSerialNumber;
    }

    /**
     * @return EetResponsibility|null
     */
    public function getEetResponsibility(): ?EetResponsibility
    {
        return $this->eetResponsibility;
    }

    /**
     * @return float|null
     */
    public function getExchangeRate(): ?float
    {
        return $this->exchangeRate;
    }

    /**
     * @return float|null
     */
    public function getExchangeRateAmount(): ?float
    {
        return $this->exchangeRateAmount;
    }

    /**
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * @return bool
     */
    public function isEet(): bool
    {
        return $this->isEet;
    }

    /**
     * @return bool
     */
    public function isIncomeTax(): bool
    {
        return $this->isIncomeTax;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return string|null
     */
    public function getItemsTextPrefix(): ?string
    {
        return $this->itemsTextPrefix;
    }

    /**
     * @return string|null
     */
    public function getItemsTextSuffix(): ?string
    {
        return $this->itemsTextSuffix;
    }

    /**
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @return int
     */
    public function getNumericSequenceId(): int
    {
        return $this->numericSequenceId;
    }

    /**
     * @return string|null
     */
    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    /**
     * @return int
     */
    public function getPartnerId(): int
    {
        return $this->partnerId;
    }

    /**
     * @return PaymentOption
     */
    public function getPaymentOption(): PaymentOption
    {
        return $this->paymentOption;
    }

    /**
     * @return int[]|null
     */
    public function getProformaInvoices(): ?array
    {
        return $this->proformaInvoices;
    }

    /**
     * @return ReportLanguage|null
     */
    public function getReportLanguage(): ?ReportLanguage
    {
        return $this->reportLanguage;
    }

    /**
     * @return int|null
     */
    public function getSalesOrderId(): ?int
    {
        return $this->salesOrderId;
    }

    /**
     * @return int|null
     */
    public function getSalesPosEquipmentId(): ?int
    {
        return $this->salesPosEquipmentId;
    }

    /**
     * @return string|null
     */
    public function getSwift(): ?string
    {
        return $this->swift;
    }

    /**
     * @return int[]|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * @return string|null
     */
    public function getVariableSymbol(): ?string
    {
        return $this->variableSymbol;
    }

    /**
     * @return VatOnPayStatus|null
     */
    public function getVatOnPayStatus(): ?VatOnPayStatus
    {
        return $this->vatOnPayStatus;
    }

    /**
     * @return int|null
     */
    public function getVatReverseChargeCodeId(): ?int
    {
        return $this->vatReverseChargeCodeId;
    }

    public function setAccountNumber(?string $accountNumber): self
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function setBankId(?int $bankId): self
    {
        $this->bankId = $bankId;

        return $this;
    }

    public function setConstantSymbolId(?int $constantSymbolId): self
    {
        $this->constantSymbolId = $constantSymbolId;

        return $this;
    }

    public function setDateOfPayment(?\DateTimeInterface $dateOfPayment): self
    {
        $this->dateOfPayment = $dateOfPayment;

        return $this;
    }

    public function setDateOfVatApplication(?\DateTimeInterface $dateOfVatApplication): self
    {
        $this->dateOfVatApplication = $dateOfVatApplication;

        return $this;
    }

    public function setDeliveryAddressId(?int $deliveryAddressId): self
    {
        $this->deliveryAddressId = $deliveryAddressId;

        return $this;
    }

    public function setDiscountPercentage(?float $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    public function setEetResponsibility(?EetResponsibility $eetResponsibility): self
    {
        $this->eetResponsibility = $eetResponsibility;

        return $this;
    }

    public function setExchangeRate(?float $exchangeRate): self
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    public function setExchangeRateAmount(?float $exchangeRateAmount): self
    {
        $this->exchangeRateAmount = $exchangeRateAmount;

        return $this;
    }

    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function setItemsTextPrefix(?string $itemsTextPrefix): self
    {
        $this->itemsTextPrefix = $itemsTextPrefix;

        return $this;
    }

    public function setItemsTextSuffix(?string $itemsTextSuffix): self
    {
        $this->itemsTextSuffix = $itemsTextSuffix;

        return $this;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    public function addProformaInvoice(int $proformaInvoice): self
    {
        $this->proformaInvoices[] = $proformaInvoice;

        return $this;
    }

    /**
     * @param array<int> $proformaInvoices
     */
    public function setProformaInvoices(array $proformaInvoices): self
    {
        $this->proformaInvoices = $proformaInvoices;

        return $this;
    }

    public function setReportLanguage(?ReportLanguage $reportLanguage): self
    {
        $this->reportLanguage = $reportLanguage;

        return $this;
    }

    public function setSalesOrderId(?int $salesOrderId): self
    {
        $this->salesOrderId = $salesOrderId;

        return $this;
    }

    public function setSalesPosEquipmentId(?int $salesPosEquipmentId): self
    {
        $this->salesPosEquipmentId = $salesPosEquipmentId;

        return $this;
    }

    public function setSwift(?string $swift): self
    {
        $this->swift = $swift;

        return $this;
    }

    public function addTag(int $tag): self
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * @param array<int> $tags
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function setVariableSymbol(?string $variableSymbol): self
    {
        $this->variableSymbol = $variableSymbol;

        return $this;
    }

    public function setVatOnPayStatus(?VatOnPayStatus $vatOnPayStatus): self
    {
        $this->vatOnPayStatus = $vatOnPayStatus;

        return $this;
    }

    public function setVatReverseChargeCodeId(?int $vatReverseChargeCodeId): self
    {
        $this->vatReverseChargeCodeId = $vatReverseChargeCodeId;

        return $this;
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD;
    }

    public function getEndpoint(): string
    {
        return self::ENDPOINT;
    }

    /**
     * @return class-string<ContactResponse>
     */
    public function getResponseObjectClass(): string
    {
        return self::RESPONSE_CLASS;
    }
}