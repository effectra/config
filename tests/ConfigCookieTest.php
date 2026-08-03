<?php

use Effectra\Config\ConfigCookie;

it('initializes correctly through constructor', function () {
    $cookie = new ConfigCookie('my_cookie', 'my_value', 3600, '/', 'example.com', true, true);

    expect($cookie->getName())->toBe('my_cookie');
    expect($cookie->getValue())->toBe('my_value');
    expect($cookie->getExpireOrOptions())->toBe(3600);
    expect($cookie->getPath())->toBe('/');
    expect($cookie->getDomain())->toBe('example.com');
    expect($cookie->getSecure())->toBeTrue();
    expect($cookie->getHttpOnly())->toBeTrue();
});

it('can set and get values using mutator methods immutably', function () {
    $cookie = new ConfigCookie('my_cookie');

    $newCookie = $cookie->withName('new_cookie')
        ->withValue('new_value')
        ->withExpireOrOptions(7200)
        ->withPath('/new')
        ->withDomain('new.example.com')
        ->withSecure(true)
        ->withHttpOnly(true)
        ->withPrefix('prefix_');

    // Original object should be unchanged
    expect($cookie->getName())->toBe('my_cookie');
    expect($cookie->getValue())->toBe('');

    // New object should have updated values
    expect($newCookie->getName())->toBe('new_cookie');
    expect($newCookie->getValue())->toBe('new_value');
    expect($newCookie->getExpireOrOptions())->toBe(7200);
    expect($newCookie->getPath())->toBe('/new');
    expect($newCookie->getDomain())->toBe('new.example.com');
    expect($newCookie->getSecure())->toBeTrue();
    expect($newCookie->getHttpOnly())->toBeTrue();
    expect($newCookie->getPrefix())->toBe('prefix_');
});
