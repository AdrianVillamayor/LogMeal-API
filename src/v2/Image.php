<?php

declare(strict_types=1);

namespace Adrii\v2;

use Adrii\OAuth\Config;
use Adrii\Http\Request;

class Image
{
    private $config;
    private $uri = "/v2/image/";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function limitations()
    {
        $url     = $this->config->getApiUri("{$this->uri}/limitations");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }


    //  Get list of accessible services (endpoints)
    public function services()
    {
        $url     = $this->config->getApiUri("{$this->uri}/services");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }

    // Get information about the available nutritional indicators
    public function availableNutrients()
    {
        $url     = $this->config->getApiUri("{$this->uri}/availableNutrients");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }


    // Returns the available languages to be assigned to APIUsers.
    public function languages()
    {
        $url     = $this->config->getApiUri("{$this->uri}/languages");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
}
