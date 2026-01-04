<?php

namespace Chargily\ChargilyPro\Api\TopUp;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\Collection;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\TopUpElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;
use Chargily\ChargilyPro\Validators\Api\CheckExistenceTopUpRequestValidator;
use Chargily\ChargilyPro\Validators\Api\MakeTopUpRequestValidator;
use Chargily\ChargilyPro\Validators\Api\ResendWebhookTopUpRequestValidator;

final class TopUpRequest extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * make topup request
     *
     * @return bool
     */
    public function make(array $data): bool
    {
        $this->validation(new MakeTopUpRequestValidator($data));
        //
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [
            "json" => $data,
        ];

        $response = $this->__request($this->credentials->test_mode, "POST", "topup/requests", $headers, $options);
        $status_code = $response->getStatusCode();

        if ($status_code === 201) {
            return true;
        }

        InvalidHttpResponse::message($response, $status_code);

        return false;
    }
    /**
     * Get TopUp details
     *
     * @param string $id
     * @return TopUpElement|null
     */
    public function get(string $id): ?TopUpElement
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "topup/requests/{$id}", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);
        // 
        if ($status_code === 200) {
            $topup = $content_array['topupQueue'];

            return (new TopUpElement())
                ->setId($topup['id'])
                ->setRequestNumber($topup['request_number'])
                ->setCustomerName($topup['customer_name'])
                ->setPhoneNumber($topup['phone_number'])
                ->setValue($topup['value'])
                ->setUsername($topup['username'])
                ->setUserId($topup['user_id'])
                ->setMode($topup['mode'])
                ->setModeId($topup['mode_id'])
                ->setOperator($topup['operator'])
                ->setStatus($topup['status'])
                ->setCreatedAt($topup['created_at'])
                ->setUpdatedAt($topup['updated_at']);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * Get Sent TopUps ids
     *
     * @return Collection|null
     */
    public function sent(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "topup/sent", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);
        // 
        if ($status_code === 200) {
            $topup = $content_array['topupQueue'];
            return new Collection($topup);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * check Existing Operation
     *
     * @param array $ids
     * @return Collection|null
     */
    public function checkExistence(array $ids): ?Collection
    {
        $this->validation(new CheckExistenceTopUpRequestValidator(["ids" => $ids]));
        //
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [
            "json" => [
                "ids" => $ids,
            ]
        ];

        $response = $this->__request($this->credentials->test_mode, "POST", "topup/checkExistingOperation", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);
        // 
        if ($status_code === 200) {
            $ids = $content_array['ids'];
            return new Collection($ids);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * Resend webhooks
     *
     * @param array $ids
     * @return bool
     */
    public function resendWebhook(array $ids): bool
    {
        $this->validation(new ResendWebhookTopUpRequestValidator(["ids" => $ids]));
        //
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [
            "json" => [
                "ids" => $ids,
            ]
        ];

        $response = $this->__request($this->credentials->test_mode, "POST", "topup/recheckProcessingRequests", $headers, $options);
        $status_code = $response->getStatusCode();
        // 
        if ($status_code === 202) {
            return true;
        }

        InvalidHttpResponse::message($response, $status_code);

        return false;
    }
}
