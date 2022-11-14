<?php

return [
    'sender' => env('SENDER_ID', 'MY_SENDER'),
    'smsq' => [
        'api_key' => env('SMSQ_APIKEY'),
        'clint_id' => env('SMSQ_CLINTID'),
    ],
];
