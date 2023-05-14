# Effectra\Config

The `Effectra\Config` library provides a set of classes and interfaces for managing and working with configuration settings in PHP applications.

## Features

- Configuration file handling: Read and manipulate configuration settings stored in files.
- Driver configuration: Define and manage driver-related settings such as host, port, username, and password.
- Cookie configuration: Create and manage HTTP cookies with various attributes.
- Editor configuration: Parse and retrieve settings from EditorConfig files.

## Installation

Install the library using [Composer](https://getcomposer.org/):

```bash
composer require effectra/config
```

## Usage

1. Include the necessary classes or interfaces in your PHP files:

```php
use Effectra\Config\ConfigFile;
use Effectra\Config\ConfigDriver;
use Effectra\Config\ConfigCookie;
use Effectra\Config\ConfigEditor;
```

2. Use the provided classes to handle configuration settings based on your application's requirements.

### Example 1: Reading and Manipulating Configuration Files

```php
use Effectra\Config\ConfigFile;

// Create a ConfigFile instance with the path to your configuration file
$configFile = new ConfigFile('/path/to/config.ini');

// Read the configuration settings from the file
$config = $configFile->read();

// Access specific sections and settings
$databaseConfig = $configFile->getSection('database');
$host = $databaseConfig['host'];
$username = $databaseConfig['username'];

// Modify a setting and write the changes back to the file
$config['app']['debug'] = true;
$configFile->setFile('/path/to/config.ini')->write($config);
```

### Example 2: Creating and Managing ConfigDriver

```php
use Effectra\Config\ConfigDriver;

// Create a ConfigDriver instance with initial settings
$driver = new ConfigDriver('mysql', 'localhost', 3306, 'username', 'password');

// Get the current driver details
$driverName = $driver->getDriver();
$host = $driver->getHost();

// Update the driver settings
$driver = $driver->withHost('newhost')->withPort(8888);

// Get the updated driver details
$newHost = $driver->getHost();
$newPort = $driver->getPort();
```

### Example 3: Creating and Modifying ConfigCookie

```php
use Effectra\Config\ConfigCookie;

// Create a ConfigCookie instance with initial attributes
$cookie = new ConfigCookie('session', 'abc123', 3600, '/', 'example.com', true, true);

// Get the cookie attributes
$name = $cookie->getName();
$secure = $cookie->getSecure();

// Create a new cookie instance with updated attributes
$newCookie = $cookie->withExpireOrOptions(7200)->withSecure(false);

// Get the updated cookie attributes
$newExpire = $newCookie->getExpireOrOptions();
$newSecure = $newCookie->getSecure();
```

### Example 4: Parsing EditorConfig File

```php
use Effectra\Config\ConfigEditor;

// Create a ConfigEditor instance with the path to an EditorConfig file
$editorConfig = new ConfigEditor('/path/to/.editorconfig');

// Get the root value from the EditorConfig file
$root = $editorConfig->getRoot();

// Get the indent_size and end_of_line settings
$indentSize = $editorConfig->getIndentSize();
$endOfLine = $editorConfig->getEndOfLine();

// Check if a charset setting is defined
if ($editorConfig->hasSection('charset')) {
    $charsetSettings = $editorConfig->getSection('charset');
    // Process the charset settings
} else {
    // Handle the case when charset settings are not present
}
```

Feel free to adjust the examples according to your specific needs and use cases.

## Contributing

Contributions are welcome! Fork the repository, make your enhancements, and submit a pull request.

## License

This library is licensed under the [MIT License](LICENSE).

## Credits

The `Effectra\Config` library is developed and maintained by [Effectra].

Feel free to update and customize the content based on your specific library details. Don't forget to replace `[link-to-documentation]` and `[Effectra]` with appropriate links and information.
