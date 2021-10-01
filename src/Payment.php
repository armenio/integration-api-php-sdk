<?php

namespace TamoJuno;

/**
 * Class Payment
 *
 * @package TamoJuno
 */
class Payment extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'payments';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createPayment(array $form_params = [])
    {
        return $this->create($form_params);
    }

    /**
     * @param null $id
     * @param null $action
     * @param array $form_params
     *
     * @return mixed
     */
    public function capture($id = null, $action = null, array $form_params = [])
    {
        return $this->post($id, 'capture', $form_params);
    }

    /**
     * @param null $id
     * @param null $action
     * @param array $form_params
     *
     * @return mixed
     */
    public function refunds($id = null, $action = null, array $form_params = [])
    {
        return $this->post($id, 'refunds', $form_params);
    }
}
