<?php

use Effectra\Config\Factory\ConfigCookieFactory;
use Effectra\Config\Contracts\ConfigCookieInterface;

it('creates a ConfigCookie instance', function () {
    $factory = new ConfigCookieFactory();
    
    $cookie = $factory->createConfigCookie('session_id', '123456', 3600, '/app', 'app.com', true, true);
    
    expect($cookie->getName())->toBe('session_id');
    expect($cookie->getValue())->toBe('123456');
    expect($cookie->getExpireOrOptions())->toBe(3600);
    expect($cookie->getPath())->toBe('/app');
    expect($cookie->getDomain())->toBe('app.com');
    expect($cookie->getSecure())->toBeTrue();
    expect($cookie->getHttpOnly())->toBeTrue();
});

it('returns default configuration array', function () {
    $factory = new ConfigCookieFactory();
    $defaultConfig = $factory->get();
    
    expect($defaultConfig)->toHaveKeys([
        'name',
        'value',
        'expires_or_options',
        'path',
        'domain',
        'secure',
        'httponly',
    ]);
});
