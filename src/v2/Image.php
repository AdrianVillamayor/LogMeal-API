<?php

declare(strict_types=1);

namespace Adrii\v2;

use Adrii\OAuth\Config;
use Adrii\Http\Request;

class Image
{
    private $config;
    private $uri = "/v2/image";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function recognition(string $image)
    {
        $url     = $this->config->getApiUri("{$this->uri}/recognition/type");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "image" => new CURLFILE($image)
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function segmentationComplete(string $image)
    {
        $url     = $this->config->getApiUri("{$this->uri}/segmentation/complete");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "image" => new CURLFILE($image)
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function segmentationQuantity(string $image, string $depth = "")
    {
        $url     = $this->config->getApiUri("{$this->uri}/segmentation/complete/quantity");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "image" => new CURLFILE($image)
        );

        if ($depth != "") $post_params["depth"] = new CURLFILE($depth);

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmType(int $img_id, int $type)
    {
        $url     = $this->config->getApiUri("{$this->uri}/complete/quantity");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id,
            "type"      => $type
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmFoodGroup(int $img_id, array $confirmedFoodGroups)
    {
        $url     = $this->config->getApiUri("{$this->uri}/complete/food_group");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"               => $img_id,
            "confirmedFoodGroups"   => $confirmedFoodGroups
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmDish(int $img_id, array $confirmedClass, array $source, ?array $food_item_position = null)
    {
        $url     = $this->config->getApiUri("{$this->uri}/complete/dish");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"            => $img_id,
            "confirmedClass"     => $confirmedClass,
            "source"             => $source
        );

        if (isset($food_item_position) && !empty($food_item_position)) $post_params["food_item_position"] = $food_item_position;

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }
}
