<?php

use Effectra\Config\ConfigDriver;

it('initializes correctly through constructor', function () {
    $driver = new ConfigDriver('mysql', '127.0.0.1', 3306, 'root', 'secret');

    expect($driver->getDriver())->toBe('mysql');
    expect($driver->getHost())->toBe('127.0.0.1');
    expect($driver->getPort())->toBe(3306);
    expect($driver->getUsername())->toBe('root');
    expect($driver->getPassword())->toBe('secret');
});

it('can set and get values using mutator methods immutably', function () {
    $driver = new ConfigDriver('sqlite', 'localhost', 5432, 'admin', 'password');

    $newDriver = $driver->withDriver('pgsql')
        ->withHost('192.168.1.1')
        ->withPort(5433)
        ->withUsername('postgres')
        ->withPassword('new_password');

    // Original object should be unchanged
    expect($driver->getDriver())->toBe('sqlite');
    expect($driver->getHost())->toBe('localhost');
    expect($driver->getPort())->toBe(5432);
    expect($driver->getUsername())->toBe('admin');
    expect($driver->getPassword())->toBe('password');

    // New object should have updated values
    expect($newDriver->getDriver())->toBe('pgsql');
    expect($newDriver->getHost())->toBe('192.168.1.1');
    expect($newDriver->getPort())->toBe(5433);
    expect($newDriver->getUsername())->toBe('postgres');
    expect($newDriver->getPassword())->toBe('new_password');
});
