<?php

namespace Chargily\ChargilyPro\Api\TopUp;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\HttpRequest;
use Chargily\ChargilyPro\Elements\WebhookElement;

final class Webhook extends ApiClassesAbstract implements ApiClassesInterface
{
    /**
     * Capture webhook request 
     *
     * @return WebhookElement|null
     */
    public function capture(): ?WebhookElement
    {
        $signature = HttpRequest::header("Signature") ?? "";
        $body = HttpRequest::body() ?? "";
        $computed_signature = hash_hmac('sha256', $body, $this->credentials->secret);

        if (hash_equals($signature, $computed_signature)) {
            $content_array = json_decode($body, true) ?? null;

            if (isset($content_array['payload'])) {
                $data = $content_array['payload'];

                return (new WebhookElement)
                    ->setId($data['id'])
                    ->setUserId($data['user_id'])
                    ->setUsername($data['username'])
                    ->setRequestNumber($data['request_number'])
                    ->setCustomerName($data['customer_name'])
                    ->setPhoneNumber($data['phone_number'])
                    ->setValue($data['value'])
                    ->setModeId($data['mode_id'])
                    ->setMode($data['mode'])
                    ->setOperator($data['operator'])
                    ->setStatus($data['status'])
                    ->setCreatedAt($data['created_at'])
                    ->setUpdatedAt($data['updated_at']);
            }
        }

        return null;
    }
}
