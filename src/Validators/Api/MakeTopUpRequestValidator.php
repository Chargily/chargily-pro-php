<?php

namespace Chargily\ChargilyPro\Validators\Api;

use Chargily\ChargilyPro\Core\Abstracts\ValidationAbstract;
use Chargily\ChargilyPro\Core\Helpers\ValidationRules;
use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;

final class MakeTopUpRequestValidator extends ValidationAbstract implements ValidationInterface
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
            "phone_number" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::numeric()
            ),
            "value" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string()
            ),
            "operator" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string()
            ),
            "mode" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string()
            ),
            "country_code" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::string(),
                ValidationRules::min(2),
                ValidationRules::max(2),
            ),
            "webhook_url" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::webhook()
            ),
            "created_at" => ValidationRules::collect(
                ValidationRules::required(),
                ValidationRules::datetime()
            ),
        ];
    }
}
