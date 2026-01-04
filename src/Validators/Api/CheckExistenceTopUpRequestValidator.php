<?php

namespace Chargily\ChargilyPro\Validators\Api;

use Chargily\ChargilyPro\Core\Abstracts\ValidationAbstract;
use Chargily\ChargilyPro\Core\Helpers\ValidationRules;
use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;

final class CheckExistenceTopUpRequestValidator extends ValidationAbstract implements ValidationInterface
{
    /**
     * Rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "ids" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::array()
            ),
        ];
    }
}
