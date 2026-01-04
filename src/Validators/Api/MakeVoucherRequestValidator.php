<?php

namespace Chargily\ChargilyPro\Validators\Api;

use Chargily\ChargilyPro\Core\Abstracts\ValidationAbstract;
use Chargily\ChargilyPro\Core\Helpers\ValidationRules;
use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;

final class MakeVoucherRequestValidator extends ValidationAbstract implements ValidationInterface
{
    /**
     * Rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "request_number" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::alpha_dash_num()
            ),
            "customer_name" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::alpha_dash_num()
            ),
            "voucher_name" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string()
            ),
            "value" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string()
            ),
        ];
    }
}
