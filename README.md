# Taleez-PHP

API documentation : https://api.taleez.com/swagger-ui.html  
Last API version: 0.1.0

## Installation

Requires PHP >= 7.1.

Using Composer:

The recommended way to install taleez-php is through [Composer](https://getcomposer.org):

First, install Composer:

```
$ curl -sS https://getcomposer.org/installer | php
```

Next, install the latest taleez-php:

```
$ php composer.phar require antoinelemaire/taleez-php
```

Finally, you can include the files in your PHP script:

```php
require "vendor/autoload.php";
```

## Usage

```php
use Taleez\TaleezClient;

$client = new TaleezClient(apiKey, apiSecret);

// List all jobs in your company
$client->candidates->add([
    'firstName' => 'John',
    'lastName' => 'Doe',
    'mail' => 'john.doe@gmail.com',
    'phone' => '0611223344',
    'initialReferrer' => 'linkedin.com',
    'lang' => 'fr',
    'recruiterId' => 5489,
]);

// Update candidate properties values
$client->candidates->update(
    12785,
    [
        [
            'id' => 12785,
            'value' => 'My new value',
            'choices' => [
                5487,
                9873,
            ],
            'starValues' => [
                [
                    'id' => 46577,
                    'value' => 3,
                ],
            ],
            'documentId' => 549672,
            'appendChoices' => false,
        ],
    ]
);

// List all jobs in your company
$client->documents->add(1337, 'VGhpcyBpcyBteSByZXN1bWU=', true);

// List all jobs in your company
$client->jobs->list();

// Count all jobs and count jobs by filter values (with at least one job)
$client->jobs->count();

// List all pools in your company
$client->pools->list();

// List available candidate properties in your company
$client->properties->list();

// List all recruiters in your company
$client->recruiters->list();

```
