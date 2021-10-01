<?php

namespace TamoJuno;

/**
 * Class Pix
 *
 * @package TamoJuno
 */
class Pix extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'pix';
    }

    /**
     * @param null $id
     * @param null $action
     * @param array $form_params
     *
     * @return mixed
     */
    public function createRandomKey($id = null, $action = null, array $form_params = [])
    {
        return $this->post($id, 'keys', $form_params);
    }

    /**
     * @param null $id
     * @param null $action
     * @param array $form_params
     *
     * @return mixed
     */
    public function createStaticQRCode($id = null, $action = null, array $form_params = [])
    {
        return $this->post($id, 'qrcodes/static', $form_params);
    }
}
