<?php

declare(strict_types=1);

namespace Effectra\Config;

use Effectra\Config\Exception\InvalidConfigFileException;
use Effectra\Fs\File;

class ConfigFile extends Config
{
    /**
     * @var string The path to the config file.
     */
    protected string $filePath;

    /**
     * Create a new ConfigFile instance.
     *
     * @param string $filePath The path to the config file.
     */
    public function __construct(string $filePath = '')
    {
        $this->filePath = $filePath;
    }

    /**
     * Set the path to the config file.
     *
     * @param string $filePath The path to the config file.
     * @return self
     */
    public function setFile(string $filePath = ''): self
    {
        $clone = clone $this;
        $clone->filePath = $filePath;
        return $clone;
    }

    /**
     * Get the path to the config file.
     *
     * @return string The path to the config file.
     */
    public function getFile(): string
    {
        return $this->filePath;
    }

    /**
     * Check if the provided file is a valid config file.
     *
     * @param mixed $file The file to check.
     * @return bool True if the file is valid, false otherwise.
     */
    public function isValidFile($file): bool
    {
        return is_array($file);
    }

    /**
     * Read the config file and return its contents as an array.
     *
     * @return array The contents of the config file as an array.
     * @throws InvalidConfigFileException If the config file is not found or is invalid.
     */
    public function read(): array
    {
        if (!File::exists($this->getFile())) {
            throw new InvalidConfigFileException("Error processing file: " . $this->getFile());
        }

        $file = require $this->getFile();

        if (!$this->isValidFile($file)) {
            throw new InvalidConfigFileException("Error processing file: " . $this->getFile() . ". The file is not valid.");
        }

        return $file;
    }

    /**
     * Read the config file and return its contents as an object.
     *
     * @return object The contents of the config file as an object.
     */
    public function readAsObject(): object
    {
        return (object) $this->read();
    }

    /**
     * Get the sections in the config file.
     *
     * @return array The sections in the config file.
     */
    public function getSections(): array
    {
        return array_keys($this->read());
    }

    /**
     * Get the contents of a specific section in the config file.
     *
     * @param string $name The name of the section.
     * @return array|null The contents of the section, or null if the section is not found.
     */
    public function getSection(string $name): ?array
    {
        return $this->read()[$name] ?? null;
    }

    /**
     * Get the subsections of a specific section in the config file.
     *
     * @param string $name The name of the section.
     * @return array|null The subsections of the section, or null if the section is not found.
     */
    public function getSubSections(string $name): array|null
    {
        if ($this->getSection($name)) {
            return array_keys($this->getSection($name));
        }
        return null;
    }
    /**
     * Check if a specific section exists in the config file.
     *
     * @param string $name The name of the section.
     * @return bool True if the section exists, false otherwise.
     */
    public function hasSection(string $name): bool
    {
        if ($this->getSection($name)) {
            return true;
        }
        return false;
    }
}
