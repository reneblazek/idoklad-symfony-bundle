<?php

namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class IsSentToPurchaser extends EnumHelper
{
    public const NOT_SENT = 0;
    public const SENT = 1;
    public const SENT_AND_READ = 2;
}