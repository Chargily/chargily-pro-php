## User
User API Management

```php

$user = $chargily->user();

```
### Balance
```php
/**
 * @return \Chargily\ChargilyPro\Api\User\Balance
 */
$balance = $user->balance();

```
1. Get Balance
Returns current balance and bonus for authenticated user.

```php
/**
 * @return null|\Chargily\ChargilyPro\Elements\UserBalanceElement
 */
$element = $balance->get();

/**
 * Available methods for $element
 * 
 * @method string getBalance()
 * @method string getBonus()
 */
```
