<?php

namespace Chargily\ChargilyPro\Auth;

use Chargily\ChargilyPro\Core\Abstracts\AuthCredentialsAbstract;
use Chargily\ChargilyPro\Validators\Auth\CredentialsValidator;

final class Credentials extends AuthCredentialsAbstract
{
    /**
     * Mode test or live
     *
     * @var string
     */
    public string $mode;
    /**
     * Check test mode
     *
     * @var boolean
     */
    public bool $test_mode;
    /**
     * Check live mode
     *
     * @var boolean
     */
    public bool $live_mode;
    /**
     * Merchant Name
     *
     * @var string
     */
    public string $name;
    /**
     * Merchant Public Key
     *
     * @var string
     */
    public string $public;
    /**
     * Merchant Secret Key
     *
     * @var string
     */
    public string $secret;

    public function __construct(array $configs)
    {
        $this->validation(new CredentialsValidator($configs));

        $this->mode = $configs["mode"];
        $this->test_mode = $this->mode === "test";
        $this->live_mode = $this->mode === "live";
        $this->name = $configs["name"];
        $this->public = $configs["public"];
        $this->secret = $configs["secret"];
    }
    /**
     * The token used with the authorization header
     *
     * @return string
     */
    public function getAuthorizationToken(): string
    {
        return $this->public;
    }
}
