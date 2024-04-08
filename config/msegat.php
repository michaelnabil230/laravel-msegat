<?php

return [
    'endpoint' => 'https://www.msegat.com/gw',

    'username' => env('MSEGAT_USERNAME'),

    'key' => env('MSEGAT_KEY'),

    'sender' => env('MSEGAT_SENDER'),

    'otp_generator' => MichaelNabil230\Msegat\OTPGenerator::class,
];
