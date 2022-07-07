<?php

declare(strict_types=1);

namespace Adrii\LogMeal;

use Adrii\LogMeal\OAuth\Config;
use Adrii\LogMeal\v2\Dataset;
use Adrii\LogMeal\v2\Image;
use Adrii\LogMeal\v2\Info;
use Adrii\LogMeal\v2\Nutrition;
use Adrii\LogMeal\v2\Profile;
use Adrii\LogMeal\v2\Score;
use Adrii\LogMeal\v2\Users;
use Adrii\LogMeal\v2\Version;

class LogMeal
{
    private $config;

    private $dataset;
    private $image;
    private $info;
    private $nutrition;
    private $profile;
    private $score;
    private $users;
    private $version;

    public function __construct(string $access_token)
    {
        $this->config = new Config($access_token);

        $this->dataset      = new Dataset($this->config);
        $this->image        = new Image($this->config);
        $this->info         = new Info($this->config);
        $this->nutrition    = new Nutrition($this->config);
        $this->profile      = new Profile($this->config);
        $this->score        = new Score($this->config);
        $this->users        = new Users($this->config);
        $this->version      = new Version($this->config);
    }

    public function setUser(int $id, string $username)
    {
        $this->config->setUserId($id);
        $this->config->setUserToken($username);
    }

    public function dataset()
    {
        return $this->dataset;
    }

    public function image()
    {
        return $this->image;
    }

    public function info()
    {
        return $this->info;
    }

    public function nutrition()
    {
        return $this->nutrition;
    }

    public function profile()
    {
        return $this->profile;
    }

    public function score()
    {
        return $this->score;
    }

    public function users()
    {
        return $this->users;
    }

    public function version()
    {
        return $this->version;
    }
}
