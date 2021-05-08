<?php

namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class VatRateType extends EnumHelper
{
    public const REDUCED_1 = 0;
    public const BASIC = 1;
    public const ZERO = 2;
    public const REDUCED_2 = 3;
}