<?php


namespace Mufin\IDokladBundle\Model\Invoice\Response;

use JMS\Serializer\Annotation as Serializer;

final class Attachment
{
    /**
     * @Serializer\SerializedName("FileName")
     * @Serializer\Type("string")
     */
    private string $fileName;

    public function getFilename(): string
    {
        return $this->fileName;
    }
}