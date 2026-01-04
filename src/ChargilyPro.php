<?php

namespace Chargily\ChargilyPro;

use Chargily\ChargilyPro\Api\TopUp;
use Chargily\ChargilyPro\Api\User;
use Chargily\ChargilyPro\Api\Voucher;
use Chargily\ChargilyPro\Auth\Credentials;

final class ChargilyPro
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
     * User API endpoint
     *
     * @return User
     */
    public function user(): User
    {
        return new User($this->credentials);
    }
    /**
     * Voucher API endpoint
     *
     * @return Voucher
     */
    public function voucher(): Voucher
    {
        return new Voucher($this->credentials);
    }
    /**
     * TopUp API endpoint
     *
     * @return TopUp
     */
    public function topup(): TopUp
    {
        return new TopUp($this->credentials);
    }
}
