<?php

namespace Mufin\IDokladBundle\Helper;

class BundleStringResponse implements BundleResponseInterface
{
    private string $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}