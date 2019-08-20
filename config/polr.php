<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Polr Setup
    |--------------------------------------------------------------------------
    */
    'polrSetupRan' => env('POLR_SETUP_RAN', false),

    /*
    |--------------------------------------------------------------------------
    | Polr Index Page Settings
    |--------------------------------------------------------------------------
    */
    'settingPublicInterface' => env('SETTING_PUBLIC_INTERFACE', true),
    'settingIndexRedirect' => env('SETTING_INDEX_REDIRECT', null),

    /*
    |--------------------------------------------------------------------------
    | Services
    |--------------------------------------------------------------------------
    */
    'services' => [
        'enableGoogleAnalytics' => env('ENABLE_GOOGLE_ANALYTICS', false),
        'googleAnalyticsID'     => env('GOOGLE_ANALYTICS_ID', null),
        'reCaptchCDN'           => env('RECAPTCHA_CDN', 'https://www.google.com/recaptcha/api.js'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Polr Meta Details
    |--------------------------------------------------------------------------
    */
    'meta' => [
        'version'           => env('VERSION', '3.0.0'),
        'releaseMonth'      => env('VERSION_RELMONTH', 'April'),
        'releaseDay'        => env('VERSION_RELDAY', '1'),
        'releaseYear'       => env('VERSION_RELYEAR', '2019'),
        'setupAuthKey'      => env('TMP_SETUP_AUTH_KEY'),
    ],
];