<?php

declare(strict_types=1);

namespace Effectra\Config;

class ConfigEditor extends Config
{
    /**
     * @var array The settings from the EditorConfig file.
     */
    protected array $settings = [];

    /**
     * Create a new ConfigEditor instance.
     *
     * @param string $file The path to the EditorConfig file.
     */
    public function __construct(string $file)
    {
        $this->settings = self::parseEditorConfigFile($file);
    }

    /**
     * Parse the EditorConfig file and return the settings as an associative array.
     *
     * @param string $path The path to the EditorConfig file.
     * @return array|false The settings as an associative array, or false on failure.
     */
    public static function parseEditorConfigFile(string $path): array|false
    {
        // Use parse_ini_file to read the contents of the EditorConfig file as an associative array
        return parse_ini_file($path, true, INI_SCANNER_RAW);
    }

    /**
     * Get the root setting from the EditorConfig file.
     *
     * @return string|null The root setting, or null if it is not set.
     */
    public function getRoot(): ?string
    {
        return $this->settings['root'] ?? null;
    }

    /**
     * Get the indent_size setting from the EditorConfig file.
     *
     * @return string|null The indent_size setting, or null if it is not set.
     */
    public function getIndentSize(): ?string
    {
        return $this->settings['indent_size'] ?? null;
    }

    /**
     * Get the end_of_line setting from the EditorConfig file.
     *
     * @return string|null The end_of_line setting, or null if it is not set.
     */
    public function getEndOfLine(): ?string
    {
        return $this->settings['end_of_line'] ?? null;
    }

    /**
     * Get the charset setting from the EditorConfig file.
     *
     * @return string|null The charset setting, or null if it is not set.
     */
    public function getCharset(): ?string
    {
        return $this->settings['charset'] ?? null;
    }
}
