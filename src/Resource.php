<?php

namespace TamoJuno;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Resource
 *
 * @package TamoJuno
 */
abstract class Resource
{
    /**
     * @var ResourceRequester 
     */
    public $resource_requester;

    /**
     * Resource constructor.
     *
     * @param array $args
     */
    public function __construct($args = [])
    {

        if (key_exists(Config::AUTH_URL, $args)) {
            Config::setAuthUrl($args[Config::AUTH_URL]);
        }

        if (key_exists(Config::RESOURCE_URL, $args)) {
            Config::setResourceUrl($args[Config::RESOURCE_URL]);
        }

        if (key_exists(Config::PRIVATE_TOKEN, $args)) {
            Config::setPrivateToken($args[Config::PRIVATE_TOKEN]);
        }

        if (key_exists(Config::PUBLIC_TOKEN, $args)) {
            Config::setPublicToken($args[Config::PUBLIC_TOKEN]);
        }

        if (key_exists(Config::CLIENT_ID, $args)) {
            Config::setClientId($args[Config::CLIENT_ID]);
        }

        if (key_exists(Config::CLIENT_SECRET, $args)) {
            Config::setClientSecret($args[Config::CLIENT_SECRET]);
        }

        if (key_exists(Config::X_IDEMPOTENCY_KEY, $args)) {
            Config::setXIdempotencyKey($args[Config::X_IDEMPOTENCY_KEY]);
        }

        $this->resource_requester = new ResourceRequester();
    }

    /**
     * @return string
     */
    abstract public function endpoint(): string;

    /**
     * @param int|null $id
     * @param string|null $action
     *
     * @return string
     */
    public function url($id = null, $action = null)
    {
        $endpoint = $this->endpoint();

        if (! is_null($id)) {
            $endpoint .= '/' . $id;
        }
        if (! is_null($action)) {
            $endpoint .= '/' . $action;
        }
        return rtrim(Config::getResourceUrl(), '/') . '/' . ltrim($endpoint, '/');
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function create(array $form_params = [])
    {
        return $this->resource_requester->request('POST', $this->url(), ['json' => $form_params]);
    }

    /**
     * @param array $params
     *
     * @return mixed
     */
    public function allByQuery(array $params = [])
    {
        return $this->resource_requester->request('GET', $this->url(), ['query' => $params]);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->resource_requester->request('GET', $this->url());
    }

    /**
     * @param null $id
     *
     * @return mixed
     */
    public function retrieve($id = null)
    {
        return $this->resource_requester->request('GET', $this->url($id));
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function updateSome(array $form_params = [])
    {
        return $this->resource_requester->request('PATCH', $this->url(), ['json' => $form_params]);
    }

    /**
     * @param null $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function update($id = null, array $form_params = [])
    {
        return $this->resource_requester->request('PUT', $this->url($id), ['json' => $form_params]);
    }

    /**
     * @param null $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function delete($id = null, array $form_params = [])
    {
        return $this->resource_requester->request('DELETE', $this->url($id), ['json' => $form_params]);
    }

    /**
     * @param null $id
     * @param null $action
     *
     * @return mixed
     */
    public function getById($id = null, $action = null)
    {
        return $this->resource_requester->request('GET', $this->url($id, $action));
    }

    /**
     * @param null $action
     *
     * @return mixed
     */
    public function get($action = null)
    {
        return $this->resource_requester->request('GET', $this->url($action));
    }

    /**
     * @param null $id
     * @param null $action
     * @param array $form_params
     * @param string $formType
     *
     * @return mixed
     */
    public function post($id = null, $action = null, array $form_params = [], $formType = 'json')
    {
        return $this->resource_requester->request('POST', $this->url($id, $action), [$formType => $form_params]);
    }

    /**
     * @return ResponseInterface
     */
    public function getLastResponse()
    {
        return $this->resource_requester->lastResponse;
    }
}
