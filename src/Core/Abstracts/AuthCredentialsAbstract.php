<?php

namespace Chargily\ChargilyPro\Core\Abstracts;

use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;
use Chargily\ChargilyPro\Exceptions\ValidationException;

abstract class AuthCredentialsAbstract
{

    /**
     * Validate credentials
     *
     * @param ValidationInterface $validator
     * @param array $attributes
     * @return bool
     */
    public function validation(ValidationInterface $validation): bool
    {
        if (!$validation->passed()) {
            ValidationException::message("Authentication Credentials", $validation->errors(), 422);
        }
        return $validation->passed();
    }
}
