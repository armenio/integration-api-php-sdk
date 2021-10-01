<?php

namespace TamoJuno;

/**
 * Class DigitalAccount
 *
 * @package TamoJuno
 */
class DigitalAccount extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'digital-accounts';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createDigitalAccount(array $form_params = [])
    {
        return $this->create($form_params);
    }

    /**
     * @return mixed
     */
    public function retrieveDigitalAccount()
    {
        return $this->retrieveAll();
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function updateDigitalAccount(array $form_params = [])
    {
        return $this->updateSome($form_params);
    }
}
