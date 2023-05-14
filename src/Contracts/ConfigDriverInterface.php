<?php

declare(strict_types=1);

namespace Effectra\Config\Contracts;

interface ConfigDriverInterface
{
    /**
     * Set the driver for the configuration.
     *
     * @param string $driver The driver name.
     * @return self
     */
    public function withDriver(string $driver): self;

    /**
     * Set the host for the configuration.
     *
     * @param string $host The host address.
     * @return self
     */
    public function withHost(string $host): self;

    /**
     * Set the port for the configuration.
     *
     * @param int $port The port number.
     * @return self
     */
    public function withPort(int $port): self;

    /**
     * Set the username for the configuration.
     *
     * @param string $username The username.
     * @return self
     */
    public function withUsername(string $username): self;

    /**
     * Set the password for the configuration.
     *
     * @param string $password The password.
     * @return self
     */
    public function withPassword(string $password): self;

    /**
     * Get the driver name.
     *
     * @return string The driver name.
     */
    public function getDriver(): string;

    /**
     * Get the host address.
     *
     * @return string The host address.
     */
    public function getHost(): string;

    /**
     * Get the port number.
     *
     * @return int The port number.
     */
    public function getPort(): int;

    /**
     * Get the username.
     *
     * @return string The username.
     */
    public function getUsername(): string;

    /**
     * Get the password.
     *
     * @return string The password.
     */
    public function getPassword(): string;
}
