<?php


namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class ItemType extends EnumHelper
{
    public const NORMAL = 0;
    public const ROUND = 1;
    public const REDUCE = 2;
    public const DISCOUNT = 3;
}