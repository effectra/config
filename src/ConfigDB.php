<?php

declare(strict_types=1);

namespace Effectra\Config;

/**
 * Class ConfigDB
 *
 * Represents a configuration for a database driver.
 */
class ConfigDB extends ConfigDriver
{
    protected string $database;
    protected string $charset = 'utf8mb4';
    protected string $collation = 'utf8mb4_unicode_ci';
    protected string $prefix = '';
    protected bool $prefix_indexes = true;
    protected bool $strict = true;
    protected ?string $engine = null;
    protected array $options = [];

    /**
     * ConfigDB constructor.
     *
     * @param string $driver
     * @param string $host
     * @param int $port
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $charset
     * @param string $collation
     * @param string $prefix
     * @param bool $prefix_indexes
     * @param bool $strict
     * @param string $engine
     * @param array $options
     */
    public function __construct(
        string $driver = 'mysql',
        string $host,
        int $port = 3306,
        string $username,
        string $password,
        string $database,
        string $charset = 'utf8mb4',
        string $collation = 'utf8mb4_unicode_ci',
        string $prefix = '',
        bool $prefix_indexes = true,
        bool $strict = true,
        ?string $engine = null,
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

    /**
     * Get the database name.
     *
     * @return string
     */
    public function getDatabase(): string
    {
        return $this->database;
    }

    /**
     * Get the character set.
     *
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * Get the collation.
     *
     * @return string
     */
    public function getCollation(): string
    {
        return $this->collation;
    }

    /**
     * Get the table prefix.
     *
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * Determine if table names should be prefixed.
     *
     * @return bool
     */
    public function getPrefixIndexes(): bool
    {
        return $this->prefix_indexes;
    }

    /**
     * Determine if strict mode is enabled.
     *
     * @return bool
     */
    public function getStrict(): bool
    {
        return $this->strict;
    }

    /**
     * Get the database engine.
     *
     * @return null|string
     */
    public function getEngine(): ?string
    {
        return $this->engine;
    }

    /**
     * Get the database connection options.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Get a specific database connection option.
     *
     * @param string $option
     * @return mixed|null
     */
    public function getOption(string $option): mixed
    {
        return $this->options[$option] ?? null;
    }

    /**
     * Set the database name and return a new instance.
     *
     * @param string $database
     * @return self
     */
    public function withDatabase(string $database): self
    {
        $clone = clone $this;
        $clone->database = $database;
        return $clone;
    }

    /**
     * Set the character set and return a new instance.
     *
     * @param string $charset
     * @return self
     */
    public function withCharset(string $charset): self
    {
        $clone = clone $this;
        $clone->charset = $charset;
        return $clone;
    }

    /**
     * Set the collation and return a new instance.
     *
     * @param string $collation
     * @return self
     */
    public function withCollation(string $collation): self
    {
        $clone = clone $this;
        $clone->collation = $collation;
        return $clone;
    }

    /**
     * Set the table prefix and return a new instance.
     *
     * @param string $prefix
     * @return self
     */
    public function withPrefix(string $prefix): self
    {
        $clone = clone $this;
        $clone->prefix = $prefix;
        return $clone;
    }

    /**
     * Set whether table names should be prefixed and return a new instance.
     *
     * @param bool $prefix_indexes
     * @return self
     */
    public function withPrefixIndexes(bool $prefix_indexes): self
    {
        $clone = clone $this;
        $clone->prefix_indexes = $prefix_indexes;
        return $clone;
    }

    /**
     * Set whether strict mode is enabled and return a new instance.
     *
     * @param bool $strict
     * @return self
     */
    public function withStrict(bool $strict): self
    {
        $clone = clone $this;
        $clone->strict = $strict;
        return $clone;
    }

    /**
     * Set the database engine and return a new instance.
     *
     * @param mixed $engine
     * @return self
     */
    public function withEngine(mixed $engine): self
    {
        $clone = clone $this;
        $clone->engine = $engine;
        return $clone;
    }

    /**
     * Set the database connection options and return a new instance.
     *
     * @param array $options
     * @return self
     */
    public function withOptions(array $options): self
    {
        $clone = clone $this;
        $clone->options = $options;
        return $clone;
    }

    /**
     * Add a database connection option and return a new instance.
     *
     * @param array $options
     * @return self
     */
    public function withOption(array $options): self
    {
        $clone = clone $this;
        $clone->options[] = $options;
        return $clone;
    }

    /**
     * Determine if a specific database connection option exists.
     *
     * @param string $option
     * @return bool
     */
    public function hasOption(string $option): bool
    {
        return isset($this->options[$option]);
    }
}
