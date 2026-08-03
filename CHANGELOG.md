# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added
- Comprehensive test suite for all configuration classes and factories using Pest.
  - `ConfigTest`
  - `ConfigCookieTest`
  - `ConfigDBTest`
  - `ConfigDriverTest`
  - `ConfigEditorTest`
  - `ConfigFileTest`
  - `ConfigUploadsTest`
  - `ConfigCookieFactoryTest`
  - `ConfigDriverFactoryTest`
- Added `_ide_helper.php` dummy file to resolve `composer autoload-dev` warnings.

### Changed
- Updated `composer.lock` dependencies via `composer update` to ensure testing and static analysis tools (`pestphp/pest`, `phpstan/phpstan`) are up to date and correctly installed.
- **ConfigDB**: Removed default values for `$driver` and `$port` in the constructor to fix PHP 8.0 deprecation warnings (`parameter.requiredAfterOptional`) flagged by PHPStan.

### Fixed
- **ConfigCookie**: Fixed a bug in the `withPrefix()` mutator method where it was incorrectly mutating the `$value` property instead of the `$prefix` property.
- **ConfigFile**: Replaced the non-existent `Effectra\Fs\File::exists()` dependency call with PHP's native `file_exists()` to resolve fatal errors when validating configuration files.
