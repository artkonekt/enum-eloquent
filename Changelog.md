# Changelog
### Konekt Enum Eloquent

## 1.9.3
##### 2024-01-08

- Added Laravel 11 support (experimental, pre-release)

## 1.9.2
##### 2023-11-17

- Added PHP 8.3 support

## 1.9.1
##### 2023-09-25

- Bumped minimal Laravel version to 8.75
- Fixed issue where CastEnum did not take in account hidden or visible properties from Eloquent

## 1.9.0
##### 2023-02-16

- Added Laravel 10 support
- Added PHP 8.2 support

## 1.8.1
##### 2022-03-11

- Fixed casting behavior so that other mutators defined on field are also
  being called before passing the value to the enum constructor

## 1.8.0
##### 2022-03-10

- Added Enum v4 support

## 1.7.2
##### 2022-02-09

- Tiny composer.json change for final Laravel 9.0 (removed minimum-stability: dev)

## 1.7.1
##### 2022-01-27

- Added PHP 8.1 support
- Added Laravel 9 support
- Dropped PHP 7.3 and PHP 7.4 support
- Dropped Laravel 6 and Laravel 7 support
- Changed CI from Travis to Github Actions
- Changed coding style to PSR-12 and using strict types across all classes

## 1.7.0
##### 2020-11-28

- Dropped PHP 7.1 & PHP 7.2 support
- Dropped Laravel 5 support
- Added PHP 8 support

## 1.6.1
##### 2020-11-04

- Fixed to array conversion exception when the enum field is not actually present in the model
- Test suite fixes for Composer v2 compatibility (dropped Ocramius Package Manager dev requirement)
- Various test suite improvements

## 1.6.0
##### 2020-09-12

- Added Laravel 8 support

## 1.5.0
##### 2020-03-06

- Laravel 7 and PHP 7.4 support

## 1.4.1
##### 2019-11-24

- PhpUnit compatibility fix (affects dev mode only)

## 1.4.0
##### 2019-11-03

- Added support for Eloquent `toArray()` (enums field values are properly included)

## 1.3.1
##### 2019-09-08

- Fixed Laravel 6.0 Support

## 1.3.0
##### 2019-09-08

- Added make:enum commands (when using in a Laravel application)
- Enum 3.0.0 is supported
- Dropped PHP 7.0 Support
- Added Laravel 6.0 Support
- Updated references to https://konekt.dev/enum website

## 1.2.0
##### 2018-11-04

- Added Laravel Collective Forms compatibility (optional)
- `isEnumAttribute()` method became protected (was private before)
- Laravel 5.6 & 5.7 are supported

## 1.1.3
##### 2017-12-08

- Fixed namespace creep bug with @notation on extended classes
- PHP 7.2 is supported (Laravel 5.4 & 5.5)

## 1.1.2
##### 2017-11-24

- Fixed Laravel 5.0 & 5.1 incompatibility introduced with v1.1.1

## 1.1.1
##### 2017-11-24

- Fixed bug with `ClassName@method` notation resolution when the host
  model's base class name was present in the namespace.

## 1.1.0
##### 2017-10-16

- Added support for `ClassName@method` notation
- Travis tests PHP 7 with Laravel 5.0-5.5 & PHP7.1 with Laravel 5.4-5.5

## 1.0.0
##### 2017-10-06

- Initial release for Enum 2.0+, Eloquent 5.0 - 5.5
- Works like Eloquent's `$cast` property on models, but internally hooks into the mutator/accessor mechanism
