<?php

namespace Nabil\Psr;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

// class user service, yang extends testcase php unit
class UserServiceTest extends TestCase
{
    // function save
    public function testSave()
    {
        // logger interface
        $logger = new Logger("belajar-php-psr");

        $streamHandler = new StreamHandler("php://stdout");
        $streamHandler->setFormatter(new JsonFormatter());
        $logger->pushHandler($streamHandler);

        $userService = new UserService($logger);
        $userService->save("Nabil");

        self::assertNotNull($logger);
    }
}
