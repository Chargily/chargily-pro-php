<?php

namespace Chargily\ChargilyPro\Elements;

use Chargily\ChargilyPro\Core\Abstracts\ElementsAbstract;
use Chargily\ChargilyPro\Core\Interfaces\ElementsInterface;

/**
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

class TopUpElement extends ElementsAbstract implements ElementsInterface {}
