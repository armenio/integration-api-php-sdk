<?php

require __DIR__ . '/../../../vendor/autoload.php';

$args = array(
    'PRIVATE_TOKEN' => 'YOUR_PRIVATE_TOKEN',
    'CLIENT_ID' => 'CLIENT_ID',
    'CLIENT_SECRET' => 'CLIENT_SECRET'
);

try {
    $creditCardService = new \TamoJuno\CreditCard($args);
    $tokenizedCard = $creditCardService->tokenizeCard([
        'creditCardHash' => 'uuid4String'
    ]);
    print_r($tokenizedCard);
} catch (\Exception $e) {
    print_r($e->getResponse()->getBody()->getContents());
}
