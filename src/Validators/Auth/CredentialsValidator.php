<?php

namespace Chargily\ChargilyPro\Validators\Auth;

use Chargily\ChargilyPro\Core\Abstracts\ValidationAbstract;
use Chargily\ChargilyPro\Core\Helpers\ValidationRules;
use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;

final class CredentialsValidator extends ValidationAbstract implements ValidationInterface
{
    /**
     * Rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "mode" => [
                ...ValidationRules::required(),
                ...ValidationRules::in(['test', 'live'])
            ],
            "name" => [
                ...ValidationRules::required(),
                ...ValidationRules::alpha_dash_num()
            ],
            "public" => [
                ...ValidationRules::required(),
                ...ValidationRules::min(16)
            ],
            "secret" => [
                ...ValidationRules::required(),
                ...ValidationRules::min(16)
            ],
        ];
    }
}
