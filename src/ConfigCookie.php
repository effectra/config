<?php

declare(strict_types=1);

namespace Effectra\Config;

use Effectra\Config\Contracts\ConfigCookieInterface;

class ConfigCookie extends Config implements ConfigCookieInterface
{

    protected string $name;
    protected string $value = "";
    protected int $expires_or_options = 0;
    protected string $path = "";
    protected string $domain = "";
    protected bool $secure = false;
    protected bool $httponly = false;
    protected string $prefix = '';

    public function __construct(
        string $name,
        string $value = "",
        int $expires_or_options = 0,
        string $path = "",
        string $domain = "",
        bool $secure = false,
        bool $httponly = false
    ) {
        $this->name = $name;
        $this->value = $value;
        $this->expires_or_options = $expires_or_options;
        $this->path = $path;
        $this->domain = $domain;
        $this->secure = $secure;
        $this->httponly = $httponly;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function getValue(): string
    {
        return $this->value;
    }
    public function getExpireOrOptions(): int
    {
        return $this->expires_or_options;
    }
    public function getPath(): string
    {
        return $this->path;
    }
    public function getDomain(): string
    {
        return $this->domain;
    }
    public function getSecure(): bool
    {
        return $this->secure;
    }
    public function getHttpOnly(): bool
    {
        return $this->httponly;
    }
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function withName(string $name): self
    {
        $clone = clone $this;
        $clone->name = $name;
        return $clone;
    }
    public function withValue(string $value = ""): self
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
    public function withExpireOrOptions(int $expires_or_options = 0): self
    {
        $clone = clone $this;
        $clone->expires_or_options = $expires_or_options;
        return $clone;
    }
    public function withPath(string $path = ""): self
    {
        $clone = clone $this;
        $clone->path = $path;
        return $clone;
    }
    public function withDomain(string $domain = ""): self
    {
        $clone = clone $this;
        $clone->domain = $domain;
        return $clone;
    }
    public function withSecure(bool $secure = false): self
    {
        $clone = clone $this;
        $clone->secure = $secure;
        return $clone;
    }
    public function withHttpOnly(bool $httponly = false): self
    {
        $clone = clone $this;
        $clone->httponly = $httponly;
        return $clone;
    }
    public function withPrefix(string $value = ""): self
    {
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }
}
