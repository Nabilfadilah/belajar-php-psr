<?php

namespace Nabil\Psr;

use Psr\Log\LoggerAwareTrait;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

// user service
class UserService
{
    // construct, wajib memasukan loggerInterface disini
    public function __construct(private LoggerInterface $logger) {}

    // save parameter nama
    public function save(string $name): void
    {
        // log level info pesan user name
        $this->logger->log(LogLevel::INFO, "User {$name} is saved");
    }
}
