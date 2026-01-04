<?php

namespace Chargily\ChargilyPro\Elements;

use Chargily\ChargilyPro\Core\Abstracts\ElementsAbstract;
use Chargily\ChargilyPro\Core\Interfaces\ElementsInterface;

/**
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
class VoucherElement extends ElementsAbstract implements ElementsInterface {}
