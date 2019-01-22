<?php
return [
    'version'   => '1.0.0',
    'headers'          => [
        'Accept: application/json',
        'Accept-Charset: utf-8',
        'Accept-Language: pt-br;q=0.9,pt-BR'
    ],
    'defaults'  => [
        'publishable_key'   => env('ZOOP_PUBLISHABLE_KEY'),
        'marketplace_id'    => env('ZOOP_MARKETPLACE_ID'),
        'endpoint'          => env('ZOOP_ENDPOINT', 'https://api.zoop.ws'),
        'api_version'       => env('ZOOP_APIVERSION', 'v1'),
    ]
];