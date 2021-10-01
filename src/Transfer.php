<?php

namespace TamoJuno;

/**
 * Class Transfer
 *
 * @package TamoJuno
 */
class Transfer extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'transfers';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createTransfer(array $form_params = [])
    {
        return $this->create($form_params);
    }
}
