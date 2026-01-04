## TopUp
TopUp API Management

```php

$topup = $chargily->topup();

```
### Operators
```php
/**
 * @return Chargily\ChargilyPro\Api\TopUp\Operators
 */
$operators = $topup->operators();

```
1. Get Operators List
Returns all active mobile operators.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[Chargily\ChargilyPro\Elements\OperatorElement]
 */
$list = $operators->all();

$operator = $list->first();

//$operator->getName();
/**
 * Available methods for $operator
 * 
 * @var Chargily\ChargilyPro\Elements\OperatorElement $operator
 * 
 * @method string geId()
 * @method string getLogo()
 * @method string getName()
 * @method string getCountryCode()
 * @method string getFirstNumber()
 * @method string getNumberLength()
 * @method string getDiscount()
 * @method string getModeDiscount()
 */
```

### Modes
```php
/**
 * @return Chargily\ChargilyPro\Api\TopUp\Modes
 */
$modes = $topup->modes();

```
1. Get Modes List
Returns all active recharge modes.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[Chargily\ChargilyPro\Elements\ModeElement]
 */
$list = $modes->all();

$mode = $list->first();

//$mode->getName();
/**
 * Available methods for $mode
 * 
 * @var Chargily\ChargilyPro\Elements\ModeElement $mode
 * 
 * @method string geId()
 * @method string getName()
 * @method string getOperatorId()
 * @method string getOperator()
 * @method string getCountryCode()
 * @method string getAmount()
 * @method string getDiscount()
 * @method string getValue()
 * @method string getIsActive()
 */
```
2. Get Mode Details
Returns details for a specific mode.

```php
/**
 * @return null|Chargily\ChargilyPro\Elements\ModeElement
 */
$id = "your_mode_id_here";

$mode = $modes->get($id);

//$mode->getName();
/**
 * Available methods for $mode
 * 
 * @var Chargily\ChargilyPro\Elements\ModeElement $mode
 * 
 * @method string geId()
 * @method string getName()
 * @method string getOperatorId()
 * @method string getOperator()
 * @method string getCountryCode()
 * @method string getAmount()
 * @method string getDiscount()
 * @method string getValue()
 * @method string getIsActive()
 */
```

### Webhook
```php
/**
 * @return Chargily\ChargilyPro\Api\TopUp\Webhook
 */
$webhook = $topup->webhook();

```
1. Capture Webhook Request
The system sends webhook notifications when topup request status changes.

```php
/**
 * If signature validation failed will return null
 * 
 * @return null|Chargily\ChargilyPro\Elements\WebhookElement
 */
$element = $webhook->capture();

//$element->geId();
/**
 * Available methods for $element
 * 
 * @var Chargily\ChargilyPro\Elements\WebhookElement $element
 * 
 * @method string geId()
 * @method string getUserId()
 * @method string getUsername()
 * @method string getCustomerName()
 * @method string getRequestNumber()
 * @method string getPhoneNumber()
 * @method string getModeId()
 * @method string getMode()
 * @method string getValue()
 * @method string getOperator()
 * @method string getStatus()
 * @method string getCreatedAt()
 * @method string getUpdatedAt()
 */
```

### TopUp Request
```php
/**
 * @return Chargily\ChargilyPro\Api\TopUp\TopUpRequest
 */
$request = $topup->request();

```
1. Create TopUp Request
Creates a new mobile top-up request.

```php
/**
 * @return bool
 */
$result = $request->make([
    'request_number' => "you-server-side-unique-id",
    'customer_name' => "your client name",
    'phone_number' => "your client phone number in local format",
    'country_code' => "country code ",// ISO 3166-2
    'value' => "50",// amount of topup
    'operator' => "Djezzy",//Operator
    'mode' => "DJEZZY ZID 50",//Mode name
    'webhook_url' => "your webhook url here",
    'created_at' => "Current date time",
]);

if($result){
    //
    // Topup request sent but not processed yet
    // Once processed, the Chargily Pro server will send an HTTP request to your webhook URL.
    //
}else{
    //
    // Something wrong
    //
}
```

2. Get Topup Request Status
Retrieves the status of a specific topup request.

```php
$id = "you-server-side-unique-id";
/**
 * @return null|\Chargily\ChargilyPro\Elements\TopUpElement
 */
$element = $request->get($id);

/**
 * Available methods for $element
 * 
 * @method string geId()
 * @method string getRequestNumber()
 * @method string getCustomerName()
 * @method string getPhoneNumber()
 * @method string getValue()
 * @method string getUsername()
 * @method string getUserId()
 * @method string getMode()
 * @method string getModeId()
 * @method string getOperator()
 * @method string getStatus()
 * @method string getCreatedAt()
 * @method string getUpdatedAt()
 */
```

3. Get All Sent Operations
Returns all successfully sent topup operations.

```php
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[string]
 */
$list = $request->sent();

```

4. Check Existing Operations
Checks which request numbers exist in the system.

```php
$ids = ["1234"];
/**
 * @return null|Chargily\ChargilyPro\Core\Helpers\Collection[string]
 */
$list = $request->checkExistence($ids);

```
