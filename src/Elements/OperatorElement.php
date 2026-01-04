<?php

namespace Chargily\ChargilyPro\Elements;

use Chargily\ChargilyPro\Core\Abstracts\ElementsAbstract;
use Chargily\ChargilyPro\Core\Interfaces\ElementsInterface;

/**
 * @method string geId()
 * @method string getLogo()
 * @method string getName()
 * @method string getCountryCode()
 * @method string getFirstNumber()
 * @method string getNumberLength()
 * @method string getDiscount()
 * @method string getModeDiscount()
 */

class OperatorElement extends ElementsAbstract implements ElementsInterface {}
