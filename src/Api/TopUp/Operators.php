<?php

namespace Chargily\ChargilyPro\Api\TopUp;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\Collection;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\OperatorElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;

final class Operators extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * get operators list
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "topup/operators", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $collection = new Collection([]);

            foreach ($content_array["operators"] as $operator) {
                $collection->push(
                    (new OperatorElement())
                        ->setId($operator['id'])
                        ->setLogo($operator['logo'])
                        ->setName($operator['name'])
                        ->setCountryCode($operator['country_code'])
                        ->setFirstNumber($operator['first_number'])
                        ->setNumberLength($operator['number_length'])
                        ->setDiscount($operator['discount'])
                        ->setModeDiscount($operator['mode_discount'])
                );
            }

            return $collection;
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
}
