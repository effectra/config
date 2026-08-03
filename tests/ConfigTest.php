<?php

use Effectra\Config\Config;

it('returns configuration array correctly', function () {
    $configClass = new class extends Config {
        protected string $foo = 'bar';
        public int $baz = 42;
    };

    $config = $configClass->getConfig();

    expect($config)->toHaveKey('foo', 'bar');
    expect($config)->toHaveKey('baz', 42);
});
