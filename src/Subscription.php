<?php

namespace TamoJuno;

/**
 * Class Subscription
 *
 * @package TamoJuno
 */
class Subscription extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'subscriptions';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createSubscription(array $form_params = [])
    {
        return $this->create($form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function simulation($id, array $form_params = [])
    {
        return $this->post($id, 'simulation', $form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function activation($id, array $form_params = [])
    {
        return $this->post($id, 'activation', $form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function deactivation($id, array $form_params = [])
    {
        return $this->post($id, 'deactivation', $form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function cancelation($id, array $form_params = [])
    {
        return $this->post($id, 'cancelation', $form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function completion($id, array $form_params = [])
    {
        return $this->post($id, 'completion', $form_params);
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getSubscription($id)
    {
        return $this->retrieve($id);
    }

    /**
     * @return mixed
     */
    public function getSubscriptions()
    {
        return $this->retrieveAll();
    }
}
