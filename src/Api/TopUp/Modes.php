<?php

namespace Chargily\ChargilyPro\Api\TopUp;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\Collection;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\ModeElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;

final class Modes extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * get modes list
     *
     * @return Collection
     */
    public function all(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "topup/modes", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $collection = new Collection([]);

            foreach ($content_array["modes"] as $operator) {
                $collection->push(
                    (new ModeElement())
                        ->setId($operator['id'])
                        ->setName($operator['mode'])
                        ->setOperatorId($operator['operator_id'])
                        ->setOperator($operator['operator'])
                        ->setCountryCode($operator['country_code'])
                        ->setAmount($operator['amount'])
                        ->setDiscount($operator['discount'])
                        ->setValue($operator['value'])
                        ->setIsActive($operator['is_active'])
                );
            }

            return $collection;
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * Get Mode details
     *
     * @param string $id
     * @return ModeElement|null
     */
    public function get(string $id): ?ModeElement
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "topup/modes/{$id}", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $mode = $content_array['mode'];

            return (new ModeElement())
                ->setId($mode['id'])
                ->setName($mode['mode'])
                ->setOperatorId($mode['operator_id'])
                ->setOperator($mode['operator'])
                ->setCountryCode($mode['country_code'])
                ->setAmount($mode['amount'])
                ->setDiscount($mode['discount'])
                ->setValue($mode['value'])
                ->setIsActive($mode['is_active']);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
}
