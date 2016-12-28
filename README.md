# PlacetoPay PSE SDK for PHP

[![Build Status](https://travis-ci.org/alejobit/placetopay-pse-php.svg?branch=master)](https://travis-ci.org/alejobit/placetopay-pse-php)

Use PlacetoPay PSE service in your PHP project

## Requirements

- [XML](http://php.net/manual/en/book.libxml.php) and [SOAP](http://php.net/manual/en/book.soap.php) extensions must be enabled

## Installattion

Add ``alejobit/placetopay-pse-php`` as a require dependency in your ``composer.json`` file:

```bash
composer require alejobit/placetopay-pse-php
```

For the best operation of the client it is necessary to implement a library of caching compatible with the standard [PSR-6](http://www.php-fig.org/psr/psr-6/).

If your project does not have a compatible implementation, you can proceed to install the following library:

```bash
composer require symfony/cache
```
