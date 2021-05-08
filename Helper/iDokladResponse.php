<?php


namespace Mufin\IDokladBundle\Helper;

use JMS\Serializer\Annotation as Serializer;

final class iDokladResponse implements iDokladResponseInterface
{
    public const CONTEXT_RESPONSE_CLASS = 'response_class';

    /**
     * @Serializer\SerializedName("Data")
     * @Serializer\Type("Mufin\IDokladBundle\Helper\BundleResponseInterface")
     */
    private BundleResponseInterface $data;

    /**
     * @Serializer\SerializedName("ErrorCode")
     * @Serializer\Type("int")
     */
    private int $errorCode;

    /**
     * @Serializer\SerializedName("IsSuccess")
     * @Serializer\Type("bool")
     */
    private bool $success;

    /**
     * @Serializer\SerializedName("Message")
     * @Serializer\Type("string")
     */
    private string $message;

    /**
     * @Serializer\SerializedName("StatusCode")
     * @Serializer\Type("int")
     */
    private int $statusCode;

    public function getData(): BundleResponseInterface
    {
        return $this->data;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }
}