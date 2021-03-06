<?php

namespace AppBundle\Service;

use AppBundle\Event\ApiEvent;
use GuzzleHttp\Client;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class Weather
{
    private $lang;
    private $units;
    private $weather_key;
    private $dispatcher;
    const NAME = "weather";

    public function __construct($weatherKey, $lang = "fr", $units = "metric", EventDispatcherInterface $dispatcher)
    {
        $this->lang = $lang;
        $this->units = $units;
        $this->weather_key = $weatherKey;
        $this->dispatcher = $dispatcher;
        $this->client = new Client(['base_uri' => 'http://api.openweathermap.org/data/2.5/weather']);
    }
    
    public function getWeatherByCity($city)
    {
        $uri = "?q=" . $city . "&lang=" . $this->lang . "&units=" . $this->units . "&APPID=" . $this->weather_key;
        
        try {
            $response = $this->client->get($uri);
            error_log('[Guzzle Response] ' . $response->getStatusCode() . ' : ' . $response->getBody());
            $this->dispatcher->dispatch(ApiEvent::NAME, new ApiEvent(self::NAME, $response->getStatusCode()));
            return $response->getBody();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
    
    public function getWeatherByGeographicCoordinates($lat, $lon)
    {
        $uri = "?lat=" . $lat . "&lon=" . $lon . "&lang=" . $this->lang . "&units=" . $this->units. "&APPID=" . $this->weather_key;
        
        try {
            $response = $this->client->get($uri);
            error_log('[Guzzle Response] ' . $response->getStatusCode() . ' : ' . $response->getBody());
            $this->dispatcher->dispatch(ApiEvent::NAME, new ApiEvent(self::NAME, $response->getStatusCode()));
            return $response->getBody();
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }
}

