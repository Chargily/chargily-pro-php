<?php

namespace Chargily\ChargilyPro\Api;

use Chargily\ChargilyPro\Api\Voucher\Categories;
use Chargily\ChargilyPro\Api\Voucher\Vouchers;
use Chargily\ChargilyPro\Auth\Credentials;

final class Voucher
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
     * Vouchers Management
     *
     * @return Vouchers
     */
    public function vouchers(): Vouchers
    {
        return new Vouchers($this->credentials);
    }
    /**
     * Vouchers Categories
     *
     * @return Categories
     */
    public function categories(): Categories
    {
        return new Categories($this->credentials);
    }
}
