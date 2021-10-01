<?php

namespace TamoJuno;

/**
 * Class CreditCard
 *
 * @package TamoJuno
 */
class CreditCard extends Resource
{

    /**
     * @return string
     */
    public function endpoint(): string
    {
        return 'credit-cards/tokenization';
    }

    /**
     * @param array $form_params
     *
     * @return mixed
     */
    public function tokenizeCard(array $form_params = [])
    {
        return $this->create($form_params);
    }
}
