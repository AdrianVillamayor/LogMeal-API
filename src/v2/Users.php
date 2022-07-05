<?php

declare(strict_types=1);

namespace Adrii\v2;

use Adrii\OAuth\Config;
use Adrii\Http\Request;

class Users
{
    private $config;
    private $uri = "/v2/users/";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    /**
     * Sign Up new APIUser
     * 
     * @param string $username
     * @param string $lang
     * @return array
     * @throws Exception If element in array is not an integer
     */

    public function signUp($username, $lang)
    {
        $url     = $this->config->getApiUri("{$this->uri}/signUp");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $post_params = array(
            "username" => $username,
            "language" => $lang
        );

        $response = $this->http_request->post($url, $post_params, $headers);

        return $response;
    }

    //  Returns list of existing APIUsers for a given company
    public function APIUsers()
    {
        $url     = $this->config->getApiUri("{$this->uri}/APIUsers");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }

    // Get information about the available nutritional indicators
    public function deleteAPIUser()
    {
        $user_id = $this->config->getUserId();
        $url     = $this->config->getApiUri("{$this->uri}/deleteAPIUser/{$user_id}");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->delete($url, [], $headers);

        return $response;
    }


    // Returns the available languages to be assigned to APIUsers.
    public function getUserProfileInfo()
    {
        $user_id = $this->config->getUserId();
        $url     = $this->config->getApiUri("{$this->uri}/getUserProfileInfo/{$user_id}");
        $bearer  = $this->config->getAccessToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }
}
