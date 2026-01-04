<?php

namespace Chargily\ChargilyPro\Core\Interfaces;

use Chargily\ChargilyPro\Auth\Credentials;

interface ApiClassesInterface
{
    /**
     * constructor
     *
     * @param Credentials $credentials
     */
    public  function __construct(Credentials $credentials);
}
