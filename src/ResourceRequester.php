<?php

namespace TamoJuno;

use Psr\Http\Message\ResponseInterface;
use TamoJuno\Http\Client;
use Zend\Http\Response;
use Zend\Json\Json;

/**
 * Class ResourceRequester
 *
 * @package TamoJuno
 */
class ResourceRequester
{

    /**
     * @var Client
     */
    public $client;

    /**
     * @var Response
     */
    public $lastResponse;

    /**
     * @var array
     */
    public $lastOptions;

    /**
     * ResourceRequester constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param $method
     * @param $endpoint
     * @param array $options
     *
     * @return mixed
     */
    public function request($method, $endpoint, array $options = [])
    {
        $this->lastOptions = $options;

        try {
            $response = $this->client->request($method, $endpoint, $options);
        } catch (\Exception $e) {
            $response = $e;
        }

        return $this->response($response);
    }

    /**
     * @param Response $response
     *
     * @return mixed
     */
    public function response(Response $response)
    {
        $this->lastResponse = $response;

        $content = $response->getBody();

        $decoded = Json::decode($content);
        $data = $decoded;

        if (empty($decoded)) {
            reset($decoded);
            return $data = current($decoded);
        }

        return $data;
    }
}
