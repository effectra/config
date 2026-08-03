<?php

use Effectra\Config\ConfigFile;
use Effectra\Config\Exception\InvalidConfigFileException;

it('can set and get file path', function () {
    $configFile = new ConfigFile();
    $newConfigFile = $configFile->setFile('/path/to/config.php');

    expect($configFile->getFile())->toBe('');
    expect($newConfigFile->getFile())->toBe('/path/to/config.php');
});

it('identifies an array as a valid config file', function () {
    $configFile = new ConfigFile();
    
    expect($configFile->isValidFile([]))->toBeTrue();
    expect($configFile->isValidFile(['foo' => 'bar']))->toBeTrue();
    expect($configFile->isValidFile('string'))->toBeFalse();
});

it('throws exception if config file does not exist', function () {
    $configFile = new ConfigFile('/path/that/does/not/exist.php');
    $configFile->read();
})->throws(InvalidConfigFileException::class);

it('reads config file correctly', function () {
    // Create a temporary config file
    $tempFile = tempnam(sys_get_temp_dir(), 'config');
    file_put_contents($tempFile, "<?php return ['section1' => ['key1' => 'value1'], 'section2' => []];");

    $configFile = new ConfigFile($tempFile);
    
    $configArray = $configFile->read();
    expect($configArray)->toHaveKey('section1');

    $configObject = $configFile->readAsObject();
    expect($configObject)->toHaveProperty('section1');

    expect($configFile->getSections())->toBe(['section1', 'section2']);
    
    expect($configFile->hasSection('section1'))->toBeTrue();
    expect($configFile->hasSection('section3'))->toBeFalse();

    expect($configFile->getSection('section1'))->toBe(['key1' => 'value1']);
    expect($configFile->getSection('section3'))->toBeNull();

    expect($configFile->getSubSections('section1'))->toBe(['key1']);
    expect($configFile->getSubSections('section3'))->toBeNull();

    // Clean up
    unlink($tempFile);
});
