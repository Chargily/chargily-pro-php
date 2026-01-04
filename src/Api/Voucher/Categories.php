<?php

namespace Chargily\ChargilyPro\Api\Voucher;

use Chargily\ChargilyPro\Core\Interfaces\ApiClassesInterface;
use Chargily\ChargilyPro\Core\Abstracts\ApiClassesAbstract;
use Chargily\ChargilyPro\Core\Helpers\Collection;
use Chargily\ChargilyPro\Core\Traits\GuzzleHttpTrait;
use Chargily\ChargilyPro\Elements\CategoryElement;
use Chargily\ChargilyPro\Elements\VoucherElement;
use Chargily\ChargilyPro\Exceptions\InvalidHttpResponse;

final class Categories extends ApiClassesAbstract implements ApiClassesInterface
{
    use GuzzleHttpTrait;
    /**
     * get categories list
     *
     * @return Collection
     */
    public function list(): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "voucher/categories", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $collection = new Collection([]);

            foreach ($content_array["categories"] as $category) {
                $collection->push(
                    (new CategoryElement())
                        ->setId($category['id'])
                        ->setName($category['name'])
                        ->setImage($category['image'])
                        ->setRedeemLink($category['redeem_link'])
                        ->setRedeemLinkDescription($category['redeem_link_description'])
                        ->setCountryCode($category['country_code'])
                );
            }

            return $collection;
        }

        InvalidHttpResponse::message($response, $status_code);

        return null;
    }
    /**
     * get category vouchers
     *
     * @param string $id
     * @return VoucherElement|null
     */
    public function vouchers(string $id): ?Collection
    {
        $headers = [
            "X-Authorization" => $this->credentials->getAuthorizationToken(),
        ];
        $options = [];

        $response = $this->__request($this->credentials->test_mode, "GET", "voucher/categories/{$id}", $headers, $options);
        $status_code = $response->getStatusCode();
        $content = $response->getBody()->getContents();
        $content_array = json_decode($content, true);

        if ($status_code === 200) {
            $collection = new Collection([]);

            foreach ($content_array as $card) {
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
}
