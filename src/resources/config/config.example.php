<?php
return [
    'version'   => '1.0.0',
    'headers'          => [
        'Accept: application/json',
        'Accept-Charset: utf-8',
        'Accept-Language: pt-br;q=0.9,pt-BR'
    ],
    'defaults'  => [
        'publishable_key'   => 'YOUR_PUBLISHABLE_KEY',
        'marketplace_id'    => 'YOUR_MARKETPLACE_ID',
        'endpoint'          => 'https://api.zoop.ws',
        'endpoint_beta'     => 'https://api-beta.zoop.ws',
        'api_version'       => 'v1',
        'apis_use_beta'     => ['plans', 'subscriptions', 'invoices'],
    ]
];