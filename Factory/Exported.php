<?php

namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class Exported extends EnumHelper
{
    public const NOT_EXPORTED = 0;
    public const EXPORTED = 1;
    public const CHANGED = 2;
    public const DELETED = 3;
}