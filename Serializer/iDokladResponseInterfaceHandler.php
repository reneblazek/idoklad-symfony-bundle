<?php


namespace Mufin\IDokladBundle\Serializer;


use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use Mufin\IDokladBundle\Helper\BundleResponseInterface;
use Mufin\IDokladBundle\Helper\BundleStringResponse;
use Mufin\IDokladBundle\Helper\iDokladResponse;

class iDokladResponseInterfaceHandler implements SubscribingHandlerInterface
{

    private const FORMAT = 'json';

    /**
     * @return array<int, array<string, int|string>>
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => self::FORMAT,
                'type' => BundleResponseInterface::class,
                'method' => 'deserializeUseCaseResponseFromJson',
            ],
        ];
    }

    /**
     * @param mixed $value
     * @param array<string, mixed> $type
     *
     * @return string|BundleResponseInterface
     */
    public function deserializeUseCaseResponseFromJson(
        JsonDeserializationVisitor $visitor,
        $value,
        array $type,
        Context $context
    ) {
        if (
            is_string($value) &&
            $context->getAttribute(iDokladResponse::CONTEXT_RESPONSE_CLASS) === BundleStringResponse::class
        ) {
            return new BundleStringResponse($value);
        }

        return $context->getNavigator()->accept(
            $value,
            [
                'name' => $context->getAttribute(iDokladResponse::CONTEXT_RESPONSE_CLASS),
            ],
            $context
        );
    }
}