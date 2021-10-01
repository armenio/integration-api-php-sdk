<?php

namespace TamoJuno;

/**
 * Class Document
 *
 * @package TamoJuno
 */
class Document extends Resource
{
    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'documents';
    }

    /**
     * @return mixed
     */
    public function getDocuments()
    {
        return $this->all();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getDocument($id)
    {
        return $this->retrieve($id);
    }

    /**
     * @param null $id
     * @param array $form_params
     *
     * @return mixed
     */
    public function uploadDocuments($id = null, array $form_params = [])
    {
        return $this->post($id, 'files', $form_params, 'multipart');
    }
}
