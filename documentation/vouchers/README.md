## Vouchers / Gift cards
Vouchers/Gift Cards API Management

```php

$voucher = $chargily->voucher();

```

### Categories
```php
/**
 * @return Chargily\ChargilyPro\Api\Voucher\Categories
 */
$categories = $voucher->categories();

```

1. Get Categories List
Returns all voucher categories.
```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[Chargily\ChargilyPro\Elements\CategoryElement]
 */
$list = $categories->all();

$category = $list->first();

//$category->getName();
/**
 * Available methods for $category
 * 
 * @var Chargily\ChargilyPro\Elements\CategoryElement $category
 * 
 * @method string geId()
 * @method string getName()
 * @method string getImage()
 * @method string getRedeemLink()
 * @method string getRedeemLinkDescription()
 */
```

2. Get Category Vouchers List
Returns all cards in a specific category.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[Chargily\ChargilyPro\Elements\VoucherElement]
 */
$list = $categories->vouchers("category-id-here");

$element = $list->first();

//$element->getName();
/**
 * Available methods for $element
 * 
 * @var Chargily\ChargilyPro\Elements\VoucherElement $element
 * 
 * @method string geId()
 * @method string getCategoryId()
 * @method string getCategoryName()
 * @method string getCategoryImage()
 * @method string getName()
 * @method string getImage()
 * @method string getRedeem()
 * @method string getValue()
 * @method string getAmount()
 * @method string getDiscount()
 * @method string getIsOutOfStock()
 * @method string getCountryCode()
 */
```

### Vouchers
```php
/**
 * @return Chargily\ChargilyPro\Api\Voucher\Vouchers
 */
$vouchers = $voucher->vouchers();

```

1. Get Vouchers List
Returns all available digital vouchers, gift and prepaid cards.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[Chargily\ChargilyPro\Elements\VoucherElement]
 */
$list = $vouchers->all();

$element = $list->first();

//$element->getName();
/**
 * Available methods for $element
 * 
 * @var Chargily\ChargilyPro\Elements\VoucherElement $element
 * 
 * @method string geId()
 * @method string getCategoryId()
 * @method string getCategoryName()
 * @method string getCategoryImage()
 * @method string getName()
 * @method string getImage()
 * @method string getRedeem()
 * @method string getValue()
 * @method string getAmount()
 * @method string getDiscount()
 * @method string getIsOutOfStock()
 * @method string getCountryCode()
 */
```


2. Get Voucher Details
Returns details for a specific voucher.

```php
/**
 * @return null|\Chargily\ChargilyPro\Elements\VoucherElement
 */
$element = $vouchers->get("voucher-id-here");

/**
 * Available methods for $element
 * 
 * @method string geId()
 * @method string getCategoryId()
 * @method string getCategoryName()
 * @method string getCategoryImage()
 * @method string getName()
 * @method string getImage()
 * @method string getRedeem()
 * @method string getValue()
 * @method string getAmount()
 * @method string getDiscount()
 * @method string getIsOutOfStock()
 * @method string getCountryCode()
 */
```

3. Request Voucher
Purchases a digital voucher.

```php
/**
 * @return null|\Chargily\ChargilyPro\Elements\DeliveredVoucherElement
 */
$element = $vouchers->make([
    "request_number" => "you-server-side-unique-id",
    "customer_name" => "your-customer-name",
    "voucher_name" => "Mobilis",// Voucher name
    "value" => "100 DA",// Voucher amount
]);

/**
 * Available methods for $element
 * 
 * @method string getSerial()
 * @method string getKey()
 */
```

4. Get Recieved Vouchers
Returns all successfully sold vouchers.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[array]
 */
$list = $vouchers->sold();

$element = $list->first();
/**
 * 
 *  $element [
 *    "request_number" => "1234",
 *    "voucher_key" => "key-here",
 *  ]
 * 
 */
```
