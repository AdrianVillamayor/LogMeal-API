<?php

declare(strict_types=1);

namespace Adrii\v2;

use Adrii\OAuth\Config;
use Adrii\Http\Request;

class Version
{
    private $config;
    private $uri = "/v2/version";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function activeModels()
    {
        $url     = $this->config->getApiUri("{$this->uri}/activeModels");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }


    //  Get list of accessible services (endpoints)
    public function activeAPIs()
    {
        $url     = $this->config->getApiUri("{$this->uri}/activeAPIs");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }

    // Get information about the available nutritional indicators
    public function allModels()
    {
        $url     = $this->config->getApiUri("{$this->uri}/allModels");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
}
