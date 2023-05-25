<?php

declare(strict_types=1);

namespace Effectra\Config\Factory;

use Effectra\Config\ConfigDriver;
use Effectra\Config\Contracts\ConfigDriverInterface;

class ConfigDriverFactory
{

    public function createConfigDriver(
        string $driver = '',
        string  $host = '',
        int  $port = 80,
        string  $username = '',
        string  $password = ''
    )
    : ConfigDriverInterface
    {
        return new ConfigDriver($driver,  $host,  $port,  $username,  $password);
    }

    public function get() :array
    {
        return [
            'driver' => '',
            'host' => '',
            'port' => '',
            'username' => '',
            'password' => '',
        ];
    }
}
