<?php


namespace Mufin\IDokladBundle\Model\NumericSequence;


use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Helper\BundleResponseInterface;
use Mufin\IDokladBundle\Model\NumericSequence\Response\Item;

class NumericSequenceResponseModel implements BundleResponseInterface
{

    /**
     * @Serializer\SerializedName("Items")
     * @Serializer\Type("array<Mufin\IDokladBundle\Model\NumericSequence\Response\Item>")
     *
     * @var array<int, Item>
     */
    private array $items = [];

    /**
     * @Serializer\SerializedName("TotalItems")
     * @Serializer\Type("int")
     */
    private int $totalItems;

    /**
     * @Serializer\SerializedName("TotalPages")
     * @Serializer\Type("int")
     */
    private int $totalPages;

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }
}