<?php

namespace Chargily\ChargilyPro\Elements;

use Chargily\ChargilyPro\Core\Abstracts\ElementsAbstract;
use Chargily\ChargilyPro\Core\Interfaces\ElementsInterface;

/**
 * @method string geId()
 * @method string getUserId()
 * @method string getUsername()
 * @method string getCustomerName()
 * @method string getRequestNumber()
 * @method string getPhoneNumber()
 * @method string getModeId()
 * @method string getValue()
 * @method string getMode()
 * @method string getOperator()
 * @method string getStatus()
 * @method string getCreatedAt()
 * @method string getUpdatedAt()
 */

class WebhookElement extends ElementsAbstract implements ElementsInterface {}
