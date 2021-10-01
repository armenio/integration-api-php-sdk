<?php

namespace TamoJuno;

/**
 * Class PicPay
 *
 * @package TamoJuno
 */
class PicPay extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'qrcode';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function createQRCode(array $form_params = [])
    {
        return $this->create($form_params);
    }

    /**
     * @param $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function cancelQRCode($id, array $form_params = [])
    {
        return $this->post($id, 'cancel', $form_params);
    }
}
