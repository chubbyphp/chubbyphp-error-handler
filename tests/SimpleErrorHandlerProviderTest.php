<?php

namespace Chubbyphp\Tests\ErrorHandler;

use Chubbyphp\ErrorHandler\SimpleErrorHandlerProvider;
use Chubbyphp\Tests\ErrorHandler\Resources\ErrorResponseProvider\JsonErrorResponseProvider;
use Pimple\Container;

/**
 * @covers Chubbyphp\ErrorHandler\SimpleErrorHandlerProvider
 */
final class SimpleErrorHandlerProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testWithoutDefaultProviderExpectsException()
    {
        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Please configure your default provider for error handler!');

        $container = new Container();
        $container->register(new SimpleErrorHandlerProvider());

        $container['errorHandler.service'];
    }

    public function testWithDefaultProvider()
    {
        $container = new Container();
        $container->register(new SimpleErrorHandlerProvider());

        $container['errorHandler.defaultProvider'] = function () use ($container) {
            return new JsonErrorResponseProvider();
        };

        $container['errorHandler.service'];
    }
}
