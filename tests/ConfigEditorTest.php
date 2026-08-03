<?php

use Effectra\Config\ConfigEditor;

it('parses an editor config file correctly', function () {
    // Create a temporary editor config (INI format)
    $tempFile = tempnam(sys_get_temp_dir(), 'editorconfig');
    $iniContent = <<<INI
root = true
indent_size = 4
end_of_line = lf
charset = utf-8
INI;
    file_put_contents($tempFile, $iniContent);

    $editorConfig = new ConfigEditor($tempFile);

    expect($editorConfig->getRoot())->toBe('true'); // parse_ini_file returns 'true' with INI_SCANNER_RAW
    expect($editorConfig->getIndentSize())->toBe('4');
    expect($editorConfig->getEndOfLine())->toBe('lf');
    expect($editorConfig->getCharset())->toBe('utf-8');

    // Clean up
    unlink($tempFile);
});

it('returns null for missing settings', function () {
    $tempFile = tempnam(sys_get_temp_dir(), 'editorconfig');
    file_put_contents($tempFile, "");

    $editorConfig = new ConfigEditor($tempFile);

    expect($editorConfig->getRoot())->toBeNull();
    expect($editorConfig->getIndentSize())->toBeNull();
    expect($editorConfig->getEndOfLine())->toBeNull();
    expect($editorConfig->getCharset())->toBeNull();

    unlink($tempFile);
});
