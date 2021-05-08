<?php


namespace Mufin\IDokladBundle\Model\NumericSequence\Response;


use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\DocumentType;
use Mufin\IDokladBundle\Model\MetadataModel;


final class Item
{
    /**
     * @Serializer\SerializedName("DocumentType")
     * @Serializer\Type("int")
     */
    private int $documentType;

    /**
     * @Serializer\SerializedName("Id")
     * @Serializer\Type("int")
     */
    private int $id;

    /**
     * @Serializer\SerializedName("IsDefault")
     * @Serializer\Type("bool")
     */
    private bool $isDefault;

    /**
     * @Serializer\SerializedName("LastNumber")
     * @Serializer\Type("int")
     */
    private int $lastNumber;

    /**
     * @Serializer\SerializedName("Metadata")
     * @Serializer\Type("Mufin\IDokladBundle\Model\MetadataModel")
     */
    private MetadataModel $metadata;

    /**
     * @Serializer\SerializedName("Name")
     * @Serializer\Type("string")
     */
    private string $name;

    /**
     * @Serializer\SerializedName("NumberFormat")
     * @Serializer\Type("string")
     */
    private string $numberFormat;

    /**
     * @Serializer\SerializedName("Year")
     * @Serializer\Type("int")
     */
    private int $year;

    public function getDocumentType(): DocumentType
    {
        return $this->documentType;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isDefault(): bool
    {
        return $this->isDefault;
    }

    public function getLastNumber(): int
    {
        return $this->lastNumber;
    }

    public function getMetadata(): MetadataModel
    {
        return $this->metadata;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNumberFormat(): string
    {
        return $this->numberFormat;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}