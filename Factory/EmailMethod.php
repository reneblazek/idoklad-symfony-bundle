<?php


namespace Mufin\IDokladBundle\Factory;


use Mufin\IDokladBundle\Helper\EnumHelper;

class EmailMethod extends EnumHelper
{
    public const PDF = 0;
    public const LINK = 1;
}