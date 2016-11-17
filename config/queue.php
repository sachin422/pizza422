<?php

return [

    

    'connections' => [

       
        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue'  => 'default',
            'expire' => 60,
        ],

    ],

   

];
