<?php

declare(strict_types=1);

namespace Effectra\Config\Factory;

use Effectra\Config\ConfigCookie;
use Effectra\Config\Contracts\ConfigCookieInterface;

class ConfigCookieFactory
{
    /**
     * Create a new ConfigCookie instance.
     *
     * @param string $name The cookie name.
     * @param string $value The cookie value.
     * @param int $expires_or_options The expiration time or options.
     * @param string $path The cookie path.
     * @param string $domain The cookie domain.
     * @param bool $secure True if the cookie should be secure, false otherwise.
     * @param bool $httponly True if the cookie is HTTP-only, false otherwise.
     * @return ConfigCookieInterface The created ConfigCookie instance.
     */
    public function createConfigCookie(
        string $name,
        string $value = "",
        int $expires_or_options = 86400,
        string $path = "",
        string $domain = "",
        bool $secure = false,
        bool $httponly = false
    ): ConfigCookieInterface {
        return new ConfigCookie($name, $value, $expires_or_options, $path, $domain, $secure, $httponly);
    }

    /**
     * Get the default configuration for a ConfigCookie.
     *
     * @return array An array containing the default configuration values.
     */
    public function get(): array
    {
        return [
            'name' => '',
            'value' => '',
            'expires_or_options' => 86400,
            'path' => '',
            'domain' => '',
            'secure' => '',
            'httponly' => '',
        ];
    }
}
