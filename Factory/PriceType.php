<?php


namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class PriceType extends EnumHelper
{
    public const WITH_VAT = 0;
    public const WITHOUT_VAT = 1;
    public const ONLY_BASE = 2;
}