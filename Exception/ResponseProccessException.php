<?php

namespace Mufin\IDokladBundle\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

final class ResponseProccessException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Could not process iDoklad\'s response.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}