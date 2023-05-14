<?php

declare(strict_types=1);

namespace Effectra\Config;

class ConfigDB extends ConfigDriver
{

    protected string $database;

    protected string $charset = 'utf8mb4';

    protected string $collation = 'utf8mb4_unicode_ci';

    protected string $prefix = '';

    protected bool $prefix_indexes = true;

    protected bool $strict = true;

    protected mixed $engine = null;

    protected array $options = [];


    public function __construct(
        string $driver = 'mysql',
        string  $host,
        int  $port = 3306,
        string $username,
        string $password,
        string $database,
        string $charset = 'utf8mb4',
        string $collation = 'utf8mb4_unicode_ci',
        string $prefix = '',
        bool $prefix_indexes = true,
        bool $strict = true,
        mixed $engine = null,
        array $options = []
    ) {

        parent::__construct($driver, $host, $port, $username, $password);

        $this->database = $database;

        $this->charset = $charset;

        $this->collation = $collation;

        $this->prefix = $prefix;

        $this->prefix_indexes = $prefix_indexes;

        $this->strict = $strict;

        $this->engine = $engine;

        $this->options = $options;
    }
    public function getDatabase(): string
    {
        return $this->database;
    }
    public function getCharset(): string
    {
        return $this->charset;
    }
    public function getCollation(): string
    {
        return $this->collation;
    }
    public function getPrefix(): string
    {
        return $this->prefix;
    }
    public function getPrefixIndexes(): bool
    {
        return $this->prefix_indexes;
    }
    public function getStrict(): bool
    {
        return $this->strict;
    }
    public function getEngine(): mixed
    {
        return $this->engine;
    }
    public function getOptions(): array
    {
        return $this->options;
    }

    public function getOption(string $option): mixed
    {
        return $this->options[$option] ?? null;
    }

    public function withDatabase(string $database): self
    {
        $clone = clone $this;
        $clone->database = $database;
        return $clone;
    }
    public function withCharset(string $charset): self
    {
        $clone = clone $this;
        $clone->charset = $charset;
        return $clone;
    }
    public function withCollation(string $collation): self
    {
        $clone = clone $this;
        $clone->collation = $collation;
        return $clone;
    }
    public function withPrefix(string $prefix): self
    {
        $clone = clone $this;
        $clone->prefix = $prefix;
        return $clone;
    }
    public function withPrefix_indexes(bool $prefix_indexes): self
    {
        $clone = clone $this;
        $clone->prefix_indexes = $prefix_indexes;
        return $clone;
    }
    public function withStrict(bool $strict): self
    {
        $clone = clone $this;
        $clone->strict = $strict;
        return $clone;
    }
    public function withEngine(mixed $engine): self
    {
        $clone = clone $this;
        $clone->engine = $engine;
        return $clone;
    }
    public function withOptions(array $options): self
    {
        $clone = clone $this;
        $clone->options = $options;
        return $clone;
    }
    public function withOption(array $options): self
    {
        $clone = clone $this;
        $clone->options[] = $options;
        return $clone;
    }

    public function hasOption(string $option): bool
    {
        return $this->options[$option] ? true : false;
    }
}
