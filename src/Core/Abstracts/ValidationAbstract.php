<?php

namespace Chargily\ChargilyPro\Core\Abstracts;

use Chargily\ChargilyPro\Core\Helpers\Str;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validation;

abstract class ValidationAbstract
{
    /**
     * Undocumented variable
     *
     * @var object|null
     */
    protected ?object $validation;
    /**
     * Constructor
     */
    public function __construct(array $data)
    {
        $validator = Validation::createValidator();

        $rules = new Collection(fields: $this->rules(), allowExtraFields: true);

        $validation = $validator->validate($data, $rules);

        $this->validation = $validation;
    }
    /**
     * Rules
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
    /**
     * Errors
     *
     * @return array
     */
    public function errors(): array
    {
        $errors = [];

        if ($this->validation->count() > 0) {
            foreach ($this->validation as $error) {
                $field = Str::trim($error->getPropertyPath(), "[]");
                $errors[$field] = $error->getMessage();
            }
        }

        return $errors;
    }
    /**
     * Errors
     *
     * @return bool
     */
    public function passed(): bool
    {
        return $this->validation->count() < 1;
    }
}
