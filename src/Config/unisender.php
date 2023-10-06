<?php
/*
|--------------------------------------------------------------------------
| Laravel UNISENDER.COM API config
|--------------------------------------------------------------------------
*/
return [
    'debug' => env('UNISENDER_DEBUG', false),

    'host' => env('UNISENDER_HOST', 'https://api.unisender.com/%s/api/'),

    'api_key' => env('UNISENDER_API_KEY', ''),

    'lang' => env('UNISENDER_API_LANG', 'ru'),

    'encoding' => env('UNISENDER_ENCODING', 'UTF-8'),

    'retryCnt' => env('UNISENDER_RETRY_CNT', 4),

    'timeout' => env('UNISENDER_TIMEOUT', NULL),

    'compression' => env('UNISENDER_COMPRESSION', false),

    'platform' => env('UNISENDER_PLATFORM', NULL),

     'secret_route' => env('UNISENDER_SECRET_ROUTE', 'unisecretroute'),
];
