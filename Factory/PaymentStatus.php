<?php


namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

class PaymentStatus extends EnumHelper
{
    public const UNPAID = 0;
    public const PAID = 1;
    public const PARTIAL_PAID = 2;
    public const OVERPAID = 3;

}