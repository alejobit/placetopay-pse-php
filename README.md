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

For the best operation of the client it is necessary to implement a caching library compatible with the standard [PSR-6](http://www.php-fig.org/psr/psr-6/).

If your project does not have a compatible implementation, you can proceed to install the following library:

```bash
composer require symfony/cache
```

## Usage

Create a PSE client instance, note that the ``$login`` and ``$tranKey`` are given by PlacetoPay to be able to perform transactions on behalf of a collection site

```php
use PlacetoPay\PSE\PSE;

$pse = new PSE($login, $tranKey);
```

Setting the [PSR-6](http://www.php-fig.org/psr/psr-6/) cache adapter instance (which must implement ``Psr\Cache\CacheItemPoolInterface``)

```php
$pse->setCacheAdapter(CacheItemPoolInterface $cacheAdapter);
```

Obtains the list of banks available for the trading establishment in the PSE system of ACH Colombia

This method returns a ``PlacetoPay\PSE\Struct\ArrayOfBanks`` object (which implements ``\Iterator`` and ``\Countable`` interfaces)

```php
$bankList = $pse->getBankList();
```

Create transactions with the ``createTransaction()`` and ``createTransactionMultiCredit()`` methods:

```php
$transaction = $pse->createTransaction();
$multiCreditTransaction = $pse->createTransactionMultiCredit();
```

Load the transaction information as follows:

```php
$transaction->setBankCode($bank->getCode());
$transaction->setBankInterface(Bank::PERSONAL_INTERFACE);
$transaction->setReturnURL('https://www.placetopay.com');
$transaction->setReference(md5('reference'));
$transaction->setDescription('Description of transaction');
$transaction->setLanguage('ES');
$transaction->setCurrency('COP');
$transaction->setTotalAmount(12345.6);
$transaction->setTaxAmount(0.0);
$transaction->setDevolutionBase(0.0);
$transaction->setTipAmount(0.0);
$transaction->setPayer(array(
    'documentType' => 'CC',
    'document' => '123456789',
    'firstName' => 'Foo',
    'lastName' => 'Bar',
    'company' => 'PlacetoPay',
    'emailAddress' => 'info@placetopay.com',
    'address' => 'Calle 53 No. 45 – 112 OF. 1901',
    'city' => 'Medellín',
    'province' => 'Antioquia',
    'country' => 'CO',
    'phone' => '+57 (4) 444 2310',
    'mobile' => '+57 (4) 444 2310',
));
$transaction->setIpAddress('127.0.0.1');
$transaction->addAdditionalData('name', 'value');
```

MultiCredit transactions have an additional method to add credit concepts of the same as follows

```php
$multiCreditTransaction->addCreditConcept(array(
    'entityCode'=> '123456',
    'serviceCode' => '654321',
    'amountValue' => 12345.6,
    'taxValue' => 0.0,
    'description' => 'Description of credit concept',
));
```

Once loaded all the necessary data is sent the transaction with the method ``send()``

The ``send()`` method return a ``PlacetoPay\PSE\Struct\PSETransactionResponse`` with the result of the operation

```php
$response = $transaction->send()
```

To obtain the information of a specific transaction can use the method ``getTransactionInformation($id)`` passing the unique identifier of the transaction to consult

```php
$transactionInfo = $pse->getTransactionInformation($response->getTransactionId());
```

## Related project

- [PlacetoPay PSE Pimple Service Provider](https://github.com/alejobit/placetopay-pse-pimple), this library is compatible with [Pimple](https://github.com/silexphp/Pimple) based projects, such as the [Silex micro-framework](https://github.com/silexphp/Silex)
