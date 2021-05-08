<?php


namespace Mufin\IDokladBundle\Factory;

use Mufin\IDokladBundle\Helper\EnumHelper;

final class PaymentOption extends EnumHelper
{
    public const BANK_TRANSFER = 1;
    public const ONLINE_BY_CARD = 2;
    public const CASH = 3;
    public const CASH_ON_DELIVERY = 4;
    public const CREDIT = 5;
    public const DOWN_PAYMENT = 6;
    public const PENNY_COMPENSATION = 7;
    public const MEAL_VOUCHER = 8;
    public const PAYPAL = 9;
}