<?php

namespace Chargily\ChargilyPro\Api;

use Chargily\ChargilyPro\Api\User\Balance;
use Chargily\ChargilyPro\Auth\Credentials;

final class User
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
     * User balance
     *
     * @return Balance
     */
    public function balance(): Balance
    {
        return new Balance($this->credentials);
    }
}
