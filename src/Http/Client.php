<?php

namespace TamoJuno\Http;

use TamoJuno\Config;
use Zend\Http\Client as ZendHttpClient;
use Zend\Http\Response;
use Zend\Json\Json;

/**
 * Class Client
 *
 * @package TamoJuno\Http
 */
class Client
{
    protected $config = [];

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return Client
     */
    public function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * Client constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config = array_merge([
            'headers' => [
                'Content-Type' => 'application/json;charset=UTF-8',
                'X-Api-Version' => '2',
                'X-Resource-Token' => Config::getPrivateToken(),
                'Authorization' => 'Bearer ' . $this->generateAuthenticationToken(),
            ],
        ], $config);

        if (! empty(Config::getXIdempotencyKey())
            && ! array_key_exists('X-Idempotency-Key', $config['headers'])
        ) {
            $config['headers']['X-Idempotency-Key'] = Config::getXIdempotencyKey();
        }

        $this->setConfig($config);
    }

    /**
     * @param $method
     * @param $uri
     * @param $options
     *
     * @return Response
     */
    public function request($method, $uri, $options)
    {
        $client = new ZendHttpClient($uri);
        $client->setAdapter(new ZendHttpClient\Adapter\Socket());
        $client->setMethod(mb_strtoupper($method));
        $client->setHeaders($this->config['headers']);

        if (! empty($options)) {
            if (isset($options['json'])) {
                $client->setRawBody(Json::encode($options['json']));
            } elseif (isset($options['query'])) {
                $client->setParameterGet($options['query']);
            } elseif (isset($options['post'])) {
                $client->setParameterPost($options['post']);
            } else {
                if ('POST' === mb_strtoupper($method)) {
                    $client->setParameterPost($options);
                } else {
                    $client->setParameterGet($options);
                }
            }
        }

        try {
            $response = $client->send();
        } catch (\Exception $e) {
            die('junoClient');
        }

        return $response;
    }

    /**
     * @return string|null
     */
    private function generateAuthenticationToken(): ?string
    {
        $client = new ZendHttpClient(Config::getAuthUrl());
        $client->setAdapter(new ZendHttpClient\Adapter\Socket());
        $client->setMethod('POST');
        $client->setAuth(Config::getClientId(), Config::getClientSecret());
        $client->setParameterPost([
            'grant_type' => 'client_credentials',
        ]);

        try {
            $response = Json::decode($client->send()->getBody(), true);
        } catch (\Exception $e) {
            die('junoClient');
        }

        return $response['access_token'];
    }
}
