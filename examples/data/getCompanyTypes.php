<?php

require __DIR__ . '/../../vendor/autoload.php';

$args = array(
    'PRIVATE_TOKEN' => 'YOUR_PRIVATE_TOKEN',
    'CLIENT_ID' => 'CLIENT_ID',
    'CLIENT_SECRET' => 'CLIENT_SECRET'
);

try {
    $dataService = new \TamoJuno\Data($args);
    $companies = $dataService->getCompanyTypes();
    print_r($companies);
} catch (\Exception $e) {
    print_r($e->getResponse()->getBody()->getContents());
}
