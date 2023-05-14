<?php

declare(strict_types=1);

namespace Effectra\Config\Contracts;

interface ConfigCookieInterface
{
    /**
     * Get the name of the cookie.
     *
     * @return string The cookie name.
     */
    public function getName(): string;

    /**
     * Get the value of the cookie.
     *
     * @return string The cookie value.
     */
    public function getValue(): string;

    /**
     * Get the expiration time or options for the cookie.
     *
     * @return int The expiration time or options.
     */
    public function getExpireOrOptions(): int;

    /**
     * Get the path for which the cookie is valid.
     *
     * @return string The cookie path.
     */
    public function getPath(): string;

    /**
     * Get the domain for which the cookie is valid.
     *
     * @return string The cookie domain.
     */
    public function getDomain(): string;

    /**
     * Determine if the cookie should only be sent over a secure HTTPS connection.
     *
     * @return bool True if the cookie should be secure, false otherwise.
     */
    public function getSecure(): bool;

    /**
     * Determine if the cookie should be accessible only through the HTTP protocol.
     *
     * @return bool True if the cookie is HTTP-only, false otherwise.
     */
    public function getHttpOnly(): bool;

    /**
     * Get the prefix for the cookie.
     *
     * @return string The cookie prefix.
     */
    public function getPrefix(): string;

    /**
     * Set the name for the cookie.
     *
     * @param string $name The cookie name.
     * @return self
     */
    public function withName(string $name): self;

    /**
     * Set the value for the cookie.
     *
     * @param string $value The cookie value.
     * @return self
     */
    public function withValue(string $value = ""): self;

    /**
     * Set the expiration time or options for the cookie.
     *
     * @param int $expires_or_options The expiration time or options.
     * @return self
     */
    public function withExpireOrOptions(int $expires_or_options = 0): self;

    /**
     * Set the path for which the cookie is valid.
     *
     * @param string $path The cookie path.
     * @return self
     */
    public function withPath(string $path = ""): self;

    /**
     * Set the domain for which the cookie is valid.
     *
     * @param string $domain The cookie domain.
     * @return self
     */
    public function withDomain(string $domain = ""): self;

    /**
     * Set whether the cookie should only be sent over a secure HTTPS connection.
     *
     * @param bool $secure True if the cookie should be secure, false otherwise.
     * @return self
     */
    public function withSecure(bool $secure = false): self;

    /**
     * Set whether the cookie should be accessible only through the HTTP protocol.
     *
     * @param bool $httponly True if the cookie is HTTP-only, false otherwise.
     * @return self
     */
    public function withHttpOnly(bool $httponly = false): self;

    /**
     * Set the prefix for the cookie.
     *
     * @param string $value The cookie prefix.
     * @return self
     */
    public function withPrefix(string $value = ""): self;
}
