# Changelog

### Konekt Enum Eloquent

## 1.2

### 1.2.0
###### 2018-11-04

- Added Laravel Collective Forms compatibility (optional)
- `isEnumAttribute()` method became protected (was private before)
- Laravel 5.6 & 5.7 are supported

## 1.1

### 1.1.3
###### 2017-12-08

- Fixed namespace creep bug with @notation on extended classes
- PHP 7.2 is supported (Laravel 5.4 & 5.5)

### 1.1.2
###### 2017-11-24

- Fixed Laravel 5.0 & 5.1 incompatibility introduced with v1.1.1

### 1.1.1
###### 2017-11-24

- Fixed bug with `ClassName@method` notation resolution when the host
  model's base class name was present in the namespace.


### 1.1.0
###### 2017-10-16

- Added support for `ClassName@method` notation
- Travis tests PHP 7 with Laravel 5.0-5.5 & PHP7.1 with Laravel 5.4-5.5


## 1.0

### 1.0.0
###### 2017-10-06

- Initial release for Enum 2.0+, Eloquent 5.0 - 5.5
- Works like Eloquent's `$cast` property on models, but internally hooks into the mutator/accessor mechanism
