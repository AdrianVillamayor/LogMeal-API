<?php

declare(strict_types=1);

namespace Adrii\LogMeal\v2;

use Adrii\LogMeal\OAuth\Config;
use Adrii\LogMeal\Http\Request;

class Profile
{
    private $config;
    private $uri = "/v2/profile";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function changeLanguage(string $lang)
    {
        $url     = $this->config->getApiUri("{$this->uri}/changeLanguage");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "lang"   => $lang
        );


        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }
   
    public function modifyUserProfileInfo(array $body)
    {
        $url     = $this->config->getApiUri("{$this->uri}/foodGroups");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->post($url, $body, $headers);

        return $response;
    }
    
    public function getUserProfileInfo()
    {
        $url     = $this->config->getApiUri("{$this->uri}/ingredients");
        $bearer  = $this->config->getUserId();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
}
