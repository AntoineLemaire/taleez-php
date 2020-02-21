## Installation

Requires PHP >= 5.6.

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

// Get all jobs
$client->job->get();
```
