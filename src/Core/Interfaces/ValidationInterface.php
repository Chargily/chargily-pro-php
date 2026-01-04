<?php

namespace Chargily\ChargilyPro\Core\Interfaces;


interface ValidationInterface
{
    /**
     * Rules
     *
     * @return array
     */
    public function rules(): array;
    /**
     * Errors
     *
     * @return array
     */
    public function errors(): array;
    /**
     * Passed
     *
     * @return bool
     */
    public function passed(): bool;
}
