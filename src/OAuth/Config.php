<?php

declare(strict_types=1);

namespace Adrii\OAuth;

class Config
{
    const API_URL      = 'https://api.logmeal.es';

    private $access_token = null;
    private $user_token = null;
    private $user_id = null;


    public function __construct($access_token)
    {
        $this->access_token = $access_token;
    }

    public function setUserToken(string $user_token): void
    {
        $this->user_token = $user_token;
    }

    public function getUserToken(): string
    {
        return $this->user_token;
    }
   
    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    public function getApiUri(string $uri): ?string
    {
        return self::API_URL . "/" . $uri;
    }
}
