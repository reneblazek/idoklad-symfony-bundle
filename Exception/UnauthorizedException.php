<?php

namespace Mufin\IDokladBundle\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

final class UnauthorizedException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('You are unauthorized in iDoklad', Response::HTTP_UNAUTHORIZED);
    }
}