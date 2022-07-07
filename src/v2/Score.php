<?php

declare(strict_types=1);

namespace Adrii\LogMeal\v2;

use Adrii\LogMeal\OAuth\Config;
use Adrii\LogMeal\Http\Request;

class Score
{
    private $config;
    private $uri = "/v2/score";

    public function __construct(Config $config)
    {
        $this->config        = $config;
        $this->http_request  = new Request();
    }

    //  Get information about your current account limitations
    public function nutriScore(int $img_id)
    {
        $url     = $this->config->getApiUri("{$this->uri}/{$img_id}/nutriScore");
        $bearer  = $this->config->getUserToken();
        $headers = ["Authorization" => "Bearer {$bearer}"];

        $response = $this->http_request->get($url, [], $headers);

        return $response;
    }


    // format "YYYY-MM-DD"
    public function nutriScore4Occasion(string $occasion, string $date)
    {
        $dt = DateTime::createFromFormat("Y-m-d", $date);

        if ($dt !== false && !array_sum($dt::getLastErrors())) {
            $url     = $this->config->getApiUri("{$this->uri}/{$date}/meal/{$occasion}nutriScore");
            $bearer  = $this->config->getUserToken();
            $headers = ["Authorization" => "Bearer {$bearer}"];

            $response = $this->http_request->get($url, [], $headers);

            return $response;
        }

        throw new Exception("Error, he date format has to be Y-m-d", 1);
    }

    public function nutriScore4Day(string $date)
    {
        $dt = DateTime::createFromFormat("Y-m-d", $date);

        if ($dt !== false && !array_sum($dt::getLastErrors())) {
            $url     = $this->config->getApiUri("{$this->uri}/{$date}/meal/nutriScore");
            $bearer  = $this->config->getUserToken();
            $headers = ["Authorization" => "Bearer {$bearer}"];

            $response = $this->http_request->get($url, [], $headers);

            return $response;
        }

        throw new Exception("Error, he date format has to be Y-m-d", 1);
    }

    public function variety(string $date_from, string $date_to, ?string $occasion = null, ?string $score_type = null, ?array $foodGroups = null)
    {
        $dt = DateTime::createFromFormat("Y-m-d", $date_from);
        $dt2 = DateTime::createFromFormat("Y-m-d", $date_to);

        if (($dt !== false && !array_sum($dt::getLastErrors())) && ($dt2 !== false && !array_sum($dt2::getLastErrors()))) {
            $url     = $this->config->getApiUri("{$this->uri}/variety");
            $bearer  = $this->config->getUserToken();
            $headers = ["Authorization" => "Bearer {$bearer}"];

            $get_params = array(
                "date_from" => $date_from,
                "date_to"   => $date_to
            );

            if (isset($occasion) && !empty($occasion)) $get_params['occasion']  = $occasion;
            if (isset($score_type) && !empty($score_type)) $get_params['score_type'] = $score_type;
            if (isset($foodGroups) && !empty($foodGroups)) $get_params['foodGroups'] = $foodGroups;

            $response = $this->http_request->get($url, $get_params, $headers);

            return $response;
        }

        throw new Exception("Error, he date format has to be Y-m-d", 1);
    }
}
