<?php

declare(strict_types=1);

namespace Effectra\Config;

use Effectra\Config\Contracts\ConfigCookieInterface;

/**
 * Class ConfigCookie
 *
 * This class represents configuration options for cookies and extends the Config class.
 */
class ConfigCookie extends Config implements ConfigCookieInterface
{

    protected string $name;
    protected string $value = "";
    protected int $expiresOrOptions = 0;
    protected string $path = "";
    protected string $domain = "";
    protected bool $secure = false;
    protected bool $httponly = false;
    protected string $prefix = '';

    /**
     * ConfigCookie constructor.
     *
     * @param string $name               The name of the cookie.
     * @param string $value              (optional) The value of the cookie.
     * @param int    $expiresOrOptions   (optional) The expiration time or options for the cookie.
     * @param string $path               (optional) The path on the server where the cookie is available.
     * @param string $domain             (optional) The domain that the cookie is available to.
     * @param bool   $secure             (optional) Whether the cookie should only be transmitted over HTTPS.
     * @param bool   $httponly           (optional) Whether the cookie should be accessible only through the HTTP protocol.
     */
    public function __construct(
        string $name,
        string $value = "",
        int $expiresOrOptions = 0,
        string $path = "",
        string $domain = "",
        bool $secure = false,
        bool $httponly = false
    ) {
        $this->name = $name;
        $this->value = $value;
        $this->expiresOrOptions = $expiresOrOptions;
        $this->path = $path;
        $this->domain = $domain;
        $this->secure = $secure;
        $this->httponly = $httponly;
    }

    /**
     * Retrieves the name of the cookie.
     *
     * @return string The name of the cookie.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Retrieves the value of the cookie.
     *
     * @return string The value of the cookie.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Retrieves the expiration time or options for the cookie.
     *
     * @return int The expiration time or options for the cookie.
     */
    public function getExpireOrOptions(): int
    {
        return $this->expiresOrOptions;
    }

    /**
     * Retrieves the path on the server where the cookie is available.
     *
     * @return string The path on the server where the cookie is available.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Retrieves the domain that the cookie is available to.
     *
     * @return string The domain that the cookie is available to.
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Retrieves whether the cookie should only be transmitted over HTTPS.
     *
     * @return bool True if the cookie should only be transmitted over HTTPS, false otherwise.
     */
    public function getSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Retrieves whether the cookie should be accessible only through the HTTP protocol.
     *
     * @return bool True if the cookie should be accessible only through the HTTP protocol, false otherwise.
     */
    public function getHttpOnly(): bool
    {
        return $this->httponly;
    }

    /**
     * Retrieves the prefix for the cookie.
     *
     * @return string The prefix for the cookie.
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * Sets the name of the cookie and returns a new instance of ConfigCookie.
     *
     * @param string $name The name of the cookie.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withName(string $name): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }

    /**
     * Sets the value of the cookie and returns a new instance of ConfigCookie.
     *
     * @param string $value (optional) The value of the cookie.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withValue(string $value = ""): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    /**
     * Sets the expiration time or options for the cookie and returns a new instance of ConfigCookie.
     *
     * @param int $expiresOrOptions (optional) The expiration time or options for the cookie.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withExpireOrOptions(int $expiresOrOptions = 0): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->expiresOrOptions = $expiresOrOptions;
        return $clone;
    }

    /**
     * Sets the path on the server where the cookie is available and returns a new instance of ConfigCookie.
     *
     * @param string $path (optional) The path on the server where the cookie is available.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withPath(string $path = ""): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->path = $path;
        return $clone;
    }

    /**
     * Sets the domain that the cookie is available to and returns a new instance of ConfigCookie.
     *
     * @param string $domain (optional) The domain that the cookie is available to.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withDomain(string $domain = ""): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->domain = $domain;
        return $clone;
    }

    /**
     * Sets whether the cookie should only be transmitted over HTTPS and returns a new instance of ConfigCookie.
     *
     * @param bool $secure (optional) Whether the cookie should only be transmitted over HTTPS.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withSecure(bool $secure = false): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->secure = $secure;
        return $clone;
    }

    /**
     * Sets whether the cookie should be accessible only through the HTTP protocol and returns a new instance of ConfigCookie.
     *
     * @param bool $httponly (optional) Whether the cookie should be accessible only through the HTTP protocol.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withHttpOnly(bool $httponly = false): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->httponly = $httponly;
        return $clone;
    }

    /**
     * Sets the prefix for the cookie and returns a new instance of ConfigCookie.
     *
     * @param string $value (optional) The prefix for the cookie.
     *
     * @return ConfigCookieInterface A new instance of ConfigCookie.
     */
    public function withPrefix(string $value = ""): ConfigCookieInterface
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
}
