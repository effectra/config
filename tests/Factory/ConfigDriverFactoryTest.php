<?php

use Effectra\Config\Factory\ConfigDriverFactory;
use Effectra\Config\Contracts\ConfigDriverInterface;

it('creates a ConfigDriver instance', function () {
    $factory = new ConfigDriverFactory();
    
    $driver = $factory->createConfigDriver('mysql', '127.0.0.1', 3306, 'root', 'secret');
    
    expect($driver->getDriver())->toBe('mysql');
    expect($driver->getHost())->toBe('127.0.0.1');
    expect($driver->getPort())->toBe(3306);
    expect($driver->getUsername())->toBe('root');
    expect($driver->getPassword())->toBe('secret');
});

it('returns default configuration array', function () {
    $factory = new ConfigDriverFactory();
    $defaultConfig = $factory->get();
    
    expect($defaultConfig)->toHaveKeys([
        'driver',
        'host',
        'port',
        'username',
        'password',
    ]);
});
