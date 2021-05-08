<?php


namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class VatOnPayStatus extends EnumHelper
{
    public const DISABLED = 0;
    public const ENABLED = 1;
    public const INVOICE_NEEDS_TAXING = 2;
}