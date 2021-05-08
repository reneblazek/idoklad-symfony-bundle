<?php

namespace Mufin\IDokladBundle\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

final class NoActiveSubscriptionException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Your subscription either expired or you don\'t have one', Response::HTTP_PAYMENT_REQUIRED);
    }
}