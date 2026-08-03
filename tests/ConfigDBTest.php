<?php

use Effectra\Config\ConfigDB;

it('initializes correctly through constructor with defaults', function () {
    $db = new ConfigDB('mysql', '127.0.0.1', 3306, 'root', 'secret', 'test_db');

    expect($db->getDriver())->toBe('mysql');
    expect($db->getHost())->toBe('127.0.0.1');
    expect($db->getPort())->toBe(3306);
    expect($db->getUsername())->toBe('root');
    expect($db->getPassword())->toBe('secret');
    
    expect($db->getDatabase())->toBe('test_db');
    expect($db->getCharset())->toBe('utf8mb4');
    expect($db->getCollation())->toBe('utf8mb4_unicode_ci');
    expect($db->getPrefix())->toBe('');
    expect($db->getPrefixIndexes())->toBeTrue();
    expect($db->getStrict())->toBeTrue();
    expect($db->getEngine())->toBeNull();
    expect($db->getOptions())->toBe([]);
});

it('can set and get specific db values using mutator methods immutably', function () {
    $db = new ConfigDB('mysql', '127.0.0.1', 3306, 'root', 'secret', 'test_db');

    $newDb = $db->withDatabase('new_db')
        ->withCharset('utf8')
        ->withCollation('utf8_general_ci')
        ->withPrefix('tb_')
        ->withPrefixIndexes(false)
        ->withStrict(false)
        ->withEngine('InnoDB')
        ->withOptions(['PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION']);

    // Check original instance remains unchanged
    expect($db->getDatabase())->toBe('test_db');
    expect($db->getPrefix())->toBe('');

    // Check new instance values
    expect($newDb->getDatabase())->toBe('new_db');
    expect($newDb->getCharset())->toBe('utf8');
    expect($newDb->getCollation())->toBe('utf8_general_ci');
    expect($newDb->getPrefix())->toBe('tb_');
    expect($newDb->getPrefixIndexes())->toBeFalse();
    expect($newDb->getStrict())->toBeFalse();
    expect($newDb->getEngine())->toBe('InnoDB');
    expect($newDb->getOptions())->toBe(['PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION']);
});

it('can manipulate individual options', function () {
    $db = new ConfigDB('mysql', '127.0.0.1', 3306, 'root', 'secret', 'test_db', options: ['key1' => 'value1']);

    expect($db->hasOption('key1'))->toBeTrue();
    expect($db->getOption('key1'))->toBe('value1');
    expect($db->hasOption('missing'))->toBeFalse();
    expect($db->getOption('missing'))->toBeNull();

    // The withOption implementation in ConfigDB appends an array instead of setting a key-value. 
    // We test its current behavior: $clone->options[] = $options;
    $newDb = $db->withOption(['key2' => 'value2']);
    expect($newDb->getOptions())->toHaveCount(2);
    expect($newDb->getOptions()[0])->toBe(['key2' => 'value2']);
});
