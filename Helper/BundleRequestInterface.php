<?php

namespace Mufin\IDokladBundle\Helper;

interface BundleRequestInterface
{
    public function getHttpMethod(): string;

    public function getEndpoint(): string;

    /**
     * @return class-string<BundleResponseInterface>
     */
    public function getResponseObjectClass(): string;
}