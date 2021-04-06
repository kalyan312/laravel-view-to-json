<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Activavte View2Json
    |--------------------------------------------------------------------------
    |
    | This value determines that should take sms record in db or not
    | You can switch to a different gateway at runtime.
    | set value true to Record Log
    |
    */

    'activate' => false,

    /*
    |--------------------------------------------------------------------------
    | Secure the request
    |--------------------------------------------------------------------------
    |
    | If you active this option then you have to pass a token with header
    | If provided header token mismatch with configured `view2json_header_token`
    | no data will serve
    |
    */

    'secure_request' => false,

    /*
    |--------------------------------------------------------------------------
    | Header Token
    |--------------------------------------------------------------------------
    |
    | This token with be verify for every request
    | if it miss match with provided header data will be restricted.
    | If `view2json_header_token` is empty then the security check will be disabled.
    |
    */

    'header_token' => '',


    /*
    |--------------------------------------------------------------------------
    | Return all of the shared data for the environment
    |--------------------------------------------------------------------------
    |
    | If you make  it true then it will share all your shared data for the environment
    | This data may related to the environment and application, Sometimes, it may return sensitive data
    | which may fall your application in risk. Enable it if you really need it.
    |
    */

    'response_shared_environment_data' => false
];
