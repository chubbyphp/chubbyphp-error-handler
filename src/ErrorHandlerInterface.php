<?php

declare(strict_types=1);

namespace Chubbyphp\ErrorHandler;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface ErrorHandlerInterface
{
    /**
     * @param Request    $request
     * @param Response   $response
     * @param \Exception $exception
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, \Exception $exception): Response;
}
