<?php
/*
|--------------------------------------------------------------------------
| Laravel UNISENDER.COM API config
|--------------------------------------------------------------------------
*/
return [
    'debug' => env('UNISENDER_DEBUG', false),

    'api_key' => env('UNISENDER_API_KEY', ''),

    'encoding' => env('UNISENDER_ENCODING', 'UTF-8'),

    'retryCnt' => env('UNISENDER_RETRY_CNT', 4),

    'timeout' => env('UNISENDER_TIMEOUT', NULL),

    'compression' => env('UNISENDER_COMPRESSION', false),

    'platform' => env('UNISENDER_PLATFORM', NULL),
];