<?php

declare(strict_types=1);

namespace Adrii\LogMeal\v2;

use Adrii\LogMeal\OAuth\Config;
use Adrii\LogMeal\Http\Request;

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
    public function recipeIngredients(int $img_id, ?int $class_id = null)
    {
        $url     = $this->config->getApiUri("{$this->uri}/recipe/ingredients");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id
        );

        if (isset($class_id) && is_numeric($class_id)) $post_params['class_id'] = $class_id;

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function recipeNutritionalInfo(int $img_id, ?int $class_id = null)
    {
        $url     = $this->config->getApiUri("{$this->uri}/recipe/nutritionalInfo");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id
        );

        if (isset($class_id) && is_numeric($class_id)) $post_params['class_id'] = $class_id;

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmIngredients(int $img_id, ?int $class_id = null)
    {
        $url     = $this->config->getApiUri("{$this->uri}/confirm/ingredients");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "imageId"   => $img_id
        );

        if (isset($class_id) && is_numeric($class_id)) $post_params['class_id'] = $class_id;

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Get information about your current account limitations
    public function confirmQuantity(int $img_id, array $ingredients_per_item, ?array $salt = null, ?array $sugar = null)
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
