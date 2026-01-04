<?php

namespace Chargily\ChargilyPro\Api;

use Chargily\ChargilyPro\Api\TopUp\Modes;
use Chargily\ChargilyPro\Api\TopUp\Operators;
use Chargily\ChargilyPro\Api\TopUp\TopUpRequest;
use Chargily\ChargilyPro\Api\TopUp\Webhook;
use Chargily\ChargilyPro\Auth\Credentials;

final class TopUp
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
     * TopUp Modes
     *
     * @return Modes
     */
    public function modes(): Modes
    {
        return new Modes($this->credentials);
    }
    /**
     * TopUp Operators
     *
     * @return Operators
     */
    public function operators(): Operators
    {
        return new Operators($this->credentials);
    }
    /**
     * TopUp Webhook
     *
     * @return Webhook
     */
    public function webhook(): Webhook
    {
        return new Webhook($this->credentials);
    }
    /**
     * TopUp Request
     *
     * @return TopUpRequest
     */
    public function request(): TopUpRequest
    {
        return new TopUpRequest($this->credentials);
    }
}
