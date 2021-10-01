<?php

namespace TamoJuno;

/**
 * Class Data
 *
 * @package TamoJuno
 */
class Data extends Resource
{
    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'data';
    }

    /**
     * @return mixed
     */
    public function getBanks()
    {
        return $this->get('banks');
    }

    /**
     * @return mixed
     */
    public function getCompanyTypes()
    {
        return $this->get('company-types');
    }

    /**
     * @return mixed
     */
    public function getBusinessAreas()
    {
        return $this->get('business-areas');
    }
}
