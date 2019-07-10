<?php
return [
    'version'   => '1.0.0',
    'headers'          => [
        'Accept: application/json',
        'Accept-Charset: utf-8',
        'Accept-Language: pt-br;q=0.9,pt-BR'
    ],
    'defaults'  => [
        'publishable_key'   => env('PUBLISHABLE_KEY'),
        'marketplace_id'    => env('MARKETPLACE_ID'),
        'endpoint'          => 'https://api.zoop.ws',
        'api_version'       => 'v1',
    ]
];