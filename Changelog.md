# Changelog

### Konekt Enum Eloquent

## 1.1

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
