<?php

namespace Chubbyphp\ErrorHandler;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class SlimSingleContentTypeErrorHandler implements SlimErrorHandlerInterface
{
    /**
     * @var ErrorResponseProviderInterface
     */
    private $provider;

    /**
     * @param ErrorResponseProviderInterface $provider
     */
    public function __construct(ErrorResponseProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @param Request    $request
     * @param Response   $response
     * @param \Exception $exception
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, \Exception $exception): Response
    {
        return $this->provider->get($request, $response, $exception);
    }
}
