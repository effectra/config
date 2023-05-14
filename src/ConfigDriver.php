<?php

declare(strict_types=1);

namespace Effectra\Config;

use Effectra\Config\Contracts\ConfigDriverInterface;

class ConfigDriver extends Config implements ConfigDriverInterface
{
    /**
     * @var string The driver name.
     */
    protected string $driver;

    /**
     * @var string The host address.
     */
    protected string $host;

    /**
     * @var int The port number.
     */
    protected int $port;

    /**
     * @var string The username.
     */
    protected string $username;

    /**
     * @var string The password.
     */
    protected string $password;

    public function __construct(string $driver, string $host, int $port, string $username, string $password)
    {
        $this->driver = $driver;
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Set the driver for the configuration.
     *
     * @param string $driver The driver name.
     * @return self
     */
    public function withDriver(string $driver): self
    {
        $clone = clone $this;
        $clone->driver = $driver;
        return $clone;
    }

    /**
     * Set the host for the configuration.
     *
     * @param string $host The host address.
     * @return self
     */
    public function withHost(string $host): self
    {
        $clone = clone $this;
        $clone->host = $host;
        return $clone;
    }

    /**
     * Set the port for the configuration.
     *
     * @param int $port The port number.
     * @return self
     */
    public function withPort(int $port): self
    {
        $clone = clone $this;
        $clone->port = $port;
        return $clone;
    }

    /**
     * Set the username for the configuration.
     *
     * @param string $username The username.
     * @return self
     */
    public function withUsername(string $username): self
    {
        $clone = clone $this;
        $clone->username = $username;
        return $clone;
    }

    /**
     * Set the password for the configuration.
     *
     * @param string $password The password.
     * @return self
     */
    public function withPassword(string $password): self
    {
        $clone = clone $this;
        $clone->password = $password;
        return $clone;
    }

    /**
     * Get the driver name.
     *
     * @return string The driver name.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Get the host address.
     *
     * @return string The host address.
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Get the port number.
     *
     * @return int The port number.
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Get the username.
     *
     * @return string The username.
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get the password.
     *
     * @return string The password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}