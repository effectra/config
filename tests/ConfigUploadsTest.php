<?php

use Effectra\Config\ConfigUploads;

it('instantiates correctly and returns empty config', function () {
    $configUploads = new ConfigUploads();
    expect($configUploads->getConfig())->toBeEmpty();
});
