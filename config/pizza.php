<?php

return [

    'domains' => [
        'api' => env('DOMAIN_API', 'api.pizza'),
        'portal' => env('DOMAIN_PORTAL', 'portal.pizza'),

    ],
    'security' => [
        'protected_users' => ['admin@pizza.com', 'super@pizza.com', 'master@pizza.com', 'vendor@pizza.com', 'customer@pizza.com'],
    ],

    'api' => [
        'status' => [
            
        ]
    ]

];