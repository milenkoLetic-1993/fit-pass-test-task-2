## Installation

### Install Through Composer

```bash
$ composer require fitpass/passwordgenerator
```
## Usage

In order to use the included PasswordGenerator Facade, import the following in your file

```php
use FitPass\PasswordGenerator\Facades\PasswordGenerator;
```

The ``generate`` method allows you to pass custom specifications for the generator.

```php
 PasswordGenerator::generate($strength, $length);
```
The ``generate`` method allows you to pass custom specifications for the generator.

## Testing

In order to run tests, please run

```bash
$ ./vendor/bin/phpunit
```
