<?php

namespace TamoJuno;

/**
 * Class Plan
 *
 * @package TamoJuno
 */
class Plan extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'plans';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createPlan(array $form_params = [])
    {
        return $this->create($form_params);
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
     *
     * @return mixed
     */
    public function getPlan($id)
    {
        return $this->retrieve($id);
    }

    /**
     * @return mixed
     */
    public function getPlans()
    {
        return $this->retrieveAll();
    }
}
