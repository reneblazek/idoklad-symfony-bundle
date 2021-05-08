<?php


namespace Mufin\IDokladBundle\Model\Report;


use JMS\Serializer\Annotation as Serializer;
use Mufin\IDokladBundle\Factory\ReportLanguage;
use Mufin\IDokladBundle\Helper\BundleRequestInterface;
use Mufin\IDokladBundle\Helper\BundleStringResponse;
use Symfony\Component\HttpFoundation\Request;

class IssuedInvoiceRequestModel implements BundleRequestInterface
{
    private const HTTP_METHOD = Request::METHOD_GET;

    private const ENDPOINT = 'Reports/IssuedInvoice/%d/Pdf';

    private const RESPONSE_CLASS = BundleStringResponse::class;

    /**
     * @Serializer\SerializedName("id")
     * @Serializer\Type("int")
     */
    private int $id;

    /**
     * @Serializer\SerializedName("compressed")
     * @Serializer\Type("bool")
     */
    private bool $compressed;

    /**
     * @Serializer\SerializedName("language")
     * @Serializer\Type("enum<Mufin\IDokladBundle\Factory\ReportLanguage>")
     */
    private ReportLanguage $language;

    public function __construct(
        int $id,
        ReportLanguage $language,
        bool $compressed = false
    ) {
        $this->id = $id;
        $this->compressed = $compressed;
        $this->language = $language;
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD;
    }

    public function getEndpoint(): string
    {
        return sprintf(self::ENDPOINT,$this->id);
    }

    /**
     * @return class-string<BundleStringResponse>
     */
    public function getResponseObjectClass(): string
    {
        return self::RESPONSE_CLASS;
    }
}