<?php


return [

    'vendor' => [
        'App\Http\Controllers\Backend\DashboardController' => ['getIndex'],
        'App\Http\Controllers\Backend\ProductCategoryController' => ['getIndex', 'getCreate', 'getMatch', 'postSave', 'getClone', 'getDelete', 'postDelete'],
        'App\Http\Controllers\Backend\IndexController' => ['getLogout'],
    ],
    'admin' => [
        'App\Http\Controllers\Backend\IndexController' => ['getLogout'],
    ],
    'super_admin' => ['*'],
    'customer' => [
        'App\Http\Controllers\Backend\IndexController' => ['getLogout'],
    ],
    'manager' => [
        'App\Http\Controllers\Backend\IndexController' => ['getLogout'],
    ]

];