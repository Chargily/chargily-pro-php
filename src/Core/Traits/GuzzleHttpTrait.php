<?php

namespace Chargily\ChargilyPro\Core\Traits;

use GuzzleHttp\Client;
use Chargily\ChargilyPro\Core\Enums\BaseUriEnum;
use Psr\Http\Message\ResponseInterface;

trait GuzzleHttpTrait
{
    /**
     * get Base Uri
     *
     * @param  mixed $test_mode
     * @return string
     */
    public function getBaseUri(bool $test_mode): string
    {
        return $test_mode ? BaseUriEnum::TEST->value : BaseUriEnum::LIVE->value;
    }
    /**
     * __request
     *
     * @return ResponseInterface
     */
    public function __request(bool $test_mode, $method, $uri, $headers, $options): ResponseInterface
    {
        $client = new Client([
            "base_uri" => $this->getBaseUri($test_mode),
            'timeout'  => 10,
            "allow_redirects" => false,
            "http_errors" => false,
            "verify" => true,
            "headers" => [
                "Accept" => "application/json",
                ...$headers,
            ],
        ]);

        return $client->request($method, $uri, $options);
    }
}
