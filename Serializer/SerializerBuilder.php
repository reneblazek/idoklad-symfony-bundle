<?php


namespace Mufin\IDokladBundle\Serializer;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerInterface;

final class SerializerBuilder
{
    public static function build(): SerializerInterface
    {
        $builder = \JMS\Serializer\SerializerBuilder::create();

        return $builder->configureHandlers(
            static function (HandlerRegistry $registry) use ($builder): void {
                $registry->registerSubscribingHandler(new EnumHandler());
                $registry->registerSubscribingHandler(new iDokladResponseInterfaceHandler());
                $builder->addDefaultHandlers();
            }
        )->build();
    }
}