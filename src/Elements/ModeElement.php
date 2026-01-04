<?php

namespace Chargily\ChargilyPro\Elements;

use Chargily\ChargilyPro\Core\Abstracts\ElementsAbstract;
use Chargily\ChargilyPro\Core\Interfaces\ElementsInterface;

/**
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

class ModeElement extends ElementsAbstract implements ElementsInterface {}
