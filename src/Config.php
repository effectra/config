<?php

declare(strict_types=1);

namespace Effectra\Config;

class Config
{
    /**
     * Get the configuration as an array.
     *
     * @return array The configuration array.
     */
    public function getConfig(): array
    {
        $keys = array_keys(get_class_vars(static::class));

        $config = [];
        foreach ($keys as $key) {
            $config[$key] = $this->$key ?? null;
        }

        return $config;
    }
}
