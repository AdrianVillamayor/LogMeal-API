<?php

declare(strict_types=1);

namespace Adrii\LogMeal\v2;

use Adrii\LogMeal\OAuth\Config;
use Adrii\LogMeal\Http\Request;

class Dataset
{
    private $config;
    private $uri = "/v2/dataset";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function dishes()
    {
        $url     = $this->config->getApiUri("{$this->uri}/dishes");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
   
    public function foodGroups()
    {
        $url     = $this->config->getApiUri("{$this->uri}/foodGroups");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
    
    public function ingredients()
    {
        $url     = $this->config->getApiUri("{$this->uri}/ingredients");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
    
    public function foodGroupsFromDish()
    {
        $url     = $this->config->getApiUri("{$this->uri}/foodGroupsFromDish");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
}
