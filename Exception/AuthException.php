<?php


namespace Mufin\IDokladBundle\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

final class AuthException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Unable to authenticate. Check your credentials.', Response::HTTP_BAD_REQUEST);
    }
}