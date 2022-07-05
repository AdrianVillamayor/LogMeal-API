<?php

declare(strict_types=1);

namespace Adrii\v2;

use Adrii\OAuth\Config;
use Adrii\Http\Request;

class Nutrition
{
    private $config;
    private $uri = "/v2/nutrition";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function recipeIngredients($img_id, $class_id = "")
    {
        $url     = $this->config->getApiUri("{$this->uri}/recipe/ingredients");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id,
            "class_id"  => $class_id
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function recipeNutritionalInfo($img_id, $class_id = "")
    {
        $url     = $this->config->getApiUri("{$this->uri}/recipe/nutritionalInfo");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id,
            "class_id"  => $class_id
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmIngredients($img_id, $class_id = "")
    {
        $url     = $this->config->getApiUri("{$this->uri}/confirm/ingredients");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id,
            "class_id"  => $class_id
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmQuantity($img_id, $ingredients_per_item, $salt = null, $sugar = null)
    {
        $url     = $this->config->getApiUri("{$this->uri}/confirm/quantity");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"               => $img_id,
            "ingredients_per_item"  => $ingredients_per_item
        );

        if (isset($salt) && !empty($salt)) $post_params['salt'] = $salt;
        if (isset($sugar) && !empty($sugar)) $post_params['sugar'] = $sugar;

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }
}
