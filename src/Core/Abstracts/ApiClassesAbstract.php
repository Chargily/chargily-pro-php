<?php

namespace Chargily\ChargilyPro\Core\Abstracts;

use Chargily\ChargilyPro\Auth\Credentials;
use Chargily\ChargilyPro\Core\Helpers\Str;
use Chargily\ChargilyPro\Core\Interfaces\ValidationInterface;
use Chargily\ChargilyPro\Exceptions\ValidationException;

abstract class ApiClassesAbstract
{
    /**
     * Credentials
     *
     * @var Credentials
     */
    protected Credentials $credentials;
    /**
     * constructor
     *
     * @param Credentials $credentials
     */
    public  function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }
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
            ValidationException::message(basename(Str::replace('\\', '/', get_class($validation))), $validation->errors(), 422);
        }
        return $validation->passed();
    }
}
