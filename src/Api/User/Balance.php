<?php

namespace Chargily\ChargilyPro\Api\User;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\NumFormat;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\UserBalanceElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;

final class Balance extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * get balance
     *
     * @return Collection
     */
    public function get(): ?UserBalanceElement
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "user/balance", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            return (new UserBalanceElement())
                ->setBalance(NumFormat::parse($content_array['balance'], 2))
                ->setBonus(NumFormat::parse($content_array['bonus'], 2));
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
}
