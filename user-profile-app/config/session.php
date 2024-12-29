<?php

use Illuminate\Support\Str;

return [
    'driver' => env('SESSION_DRIVER', 'redis'),
    'lifetime' => 30,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => storage_path('framework/sessions'),
    'connection' => env('SESSION_CONNECTION'),
    'table' => env('SESSION_TABLE', 'sessions'),
    'store' => env('SESSION_STORE'),
    'lottery' => [1, 1000],
    'cookie' => env('SESSION_COOKIE', 'laravel_session'),
    'path' => '/',
    'domain' => null,
    'secure' => env('SESSION_SECURE_COOKIE', true),
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
];
