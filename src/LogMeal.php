<?php

declare(strict_types=1);

namespace Adrii;

use Adrii\OAuth\Config;
use Adrii\v2\Users;
use Adrii\v2\Info;

class LogMeal
{
    private $config;
    private $users;
    private $info;

    public function __construct(
        string $access_token
    ) {
        $this->config = new Config($access_token);

        $this->info   = new Info($this->config);
        $this->users  = new Users($this->config);
    }

    public function users()
    {
        return $this->users;
    }
   
    public function info()
    {
        return $this->info;
    }
}
