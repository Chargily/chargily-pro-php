
# Requirements

-   PHP >= 8.4

# Installation

-   Via Composer (Recomended)

```bash
composer require chargily/chargily-pro
```

# Getting Started
```php
use Chargily\ChargilyPro\Auth\Credentials;
use Chargily\ChargilyPro\ChargilyPro;

require("path-to-vendor/vendor/autoload.php");
//
//
//
$credentials = new Credentials([
    "mode" => 'live',//or test
    "name" => 'test_user_05',//your username
    "public" => 'abcdefg',//your public key here
    "secret" => 'abcdefg123',//your secret key here
]);


$chargily = new ChargilyPro($credentials);

//User API
$user = $chargily->user();
//TopUp API
$topup = $chargily->topup();
//Voucher API
$voucher = $chargily->voucher();
```


# API Documentation

## 1. [User](./user/README.md)

#### 1.1 [Balance](./user/README.md#balance)

## 2. [TopUp](./topup/README.md)

#### 2.1 [Operators](./topup/README.md#operators)
#### 2.2 [Modes](./topup/README.md#modes)
#### 2.3 [Webhooks](./topup/README.md#webhook)
#### 2.4 [TopUp Request](./topup/README.md#topup-request)


## 3. [Vouchers/Gift cards](./vouchers/README.md)

#### 3.1 [Categories](./vouchers/README.md#categories)
#### 3.2 [Vouchers](./vouchers/README.md#vouchers)
