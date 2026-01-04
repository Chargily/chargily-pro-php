<?php

namespace Chargily\ChargilyPro\Api\Voucher;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\Collection;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\DeliveredVoucherElement;
use Chargily\ChargilyPro\Elements\VoucherElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;
use Chargily\ChargilyPro\Validators\Api\MakeVoucherRequestValidator;

final class Vouchers extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * get vouchers list
     *
     * @return Collection
     */
    public function list(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "voucher/vouchers", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $collection = new Collection([]);

            foreach ($content_array["cards"] as $card) {
                $collection->push(
                    (new VoucherElement())
                        ->setId($card['id'])
                        ->setCategoryId($card['card_category_id'])
                        ->setCategoryName($card['card_category_name'])
                        ->setCategoryImage($card['category_image'])
                        ->setName($card['name'])
                        ->setImage($card['image'])
                        ->setRedeem($card['redeem'])
                        ->setValue($card['value'])
                        ->setAmount($card['amount'])
                        ->setDiscount($card['discount'])
                        ->setIsOutOfStock($card['out_of_stock'])
                        ->setCountryCode($card['country_code'])
                );
            }

            return $collection;
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * get voucher details
     *
     * @param string $id
     * @return VoucherElement|null
     */
    public function get(string $id): ?VoucherElement
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "voucher/vouchers/{$id}", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $card = $content_array['card'];

            return (new VoucherElement())
                ->setId($card['id'])
                ->setCategoryId($card['card_category_id'])
                ->setCategoryName($card['card_category_name'])
                ->setCategoryImage($card['category_image'])
                ->setName($card['name'])
                ->setImage($card['image'])
                ->setRedeem($card['redeem'])
                ->setValue($card['value'])
                ->setAmount($card['amount'])
                ->setDiscount($card['discount'])
                ->setIsOutOfStock($card['out_of_stock'])
                ->setCountryCode($card['country_code']);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * Make voucher
     *
     * @param array $data
     * @return DeliveredVoucherElement|null
     */
    public function make(array $data): ?DeliveredVoucherElement
    {
        $this->validation(new MakeVoucherRequestValidator($data));
        //
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [
            "json" => [
                ...$data,
                "quantity" => 1,
                "country_code" => "DZ",
            ],
        ];
        $response = $this->__request($this->credentials->test_mode, "POST", "voucher/requests", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            return (new DeliveredVoucherElement())
                ->setSerial($content_array["voucher_serial"])
                ->setKey($content_array["voucher_key"]);
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * Get Sold Vouchers
     *
     * @return Collection|null
     */
    public function sold(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "voucher/sold", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);
        // 
        if ($status_code === 200) {
            $vouchers = $content_array['voucherRequests'];

            $collection = new Collection([]);

            foreach ($vouchers as $request => $voucher) {
                $collection->push([
                    "request_number" => $request,
                    "voucher_key" => $voucher,
                ]);
            }

            return $collection;
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
}
