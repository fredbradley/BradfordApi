# Bradford API PHP Wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fredbradley/bradfordapi.svg?style=flat-square)](https://packagist.org/packages/fredbradley/bradfordapi)
[![Build Status](https://img.shields.io/travis/fredbradley/bradfordapi/master.svg?style=flat-square)](https://travis-ci.org/fredbradley/bradfordapi)
[![Quality Score](https://img.shields.io/scrutinizer/g/fredbradley/bradfordapi.svg?style=flat-square)](https://scrutinizer-ci.com/g/fredbradley/bradfordapi)
[![Total Downloads](https://img.shields.io/packagist/dt/fredbradley/bradfordapi.svg?style=flat-square)](https://packagist.org/packages/fredbradley/bradfordapi)

Bradford Api

## Installation

You can install the package via composer:

```bash
composer require fredbradley/bradfordapi
```

## Usage

``` php
$api = new \FredBradley\BradfordApi\BradfordApi("https://server.tld", "username", "password");
$api->request("GET", "host", [], ['owner' => 'myuser']);
// this will give you a JSON object of hosts where the owner equqals myuser
```
More helper functions will be added in due course, but this will get you going. 

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@fredbradley.co.uk instead of using the issue tracker.

## Credits

- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
