<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Polr Language Lines
    |--------------------------------------------------------------------------
    |
    */
    'title' => 'Polr',

    /*
    |--------------------------------------------------------------------------
    | Polr Setup Language Lines
    |--------------------------------------------------------------------------
    |
    */
    'setupForm' => [

        'titles' => [
            'databaseConfiguration' => 'Database Configuration',
            'appSettings'           => 'Application Settings',
            'adminAccountSettings'  => 'Admin Account Settings',
            'smtpSettings'          => 'SMTP Settings',
            'apiSettings'           => 'API Settings',
            'otherSettings'         => 'Other Settings',
            'reCapConfig'           => 'reCAPTCHA Configuration',
        ],

        'labels' => [
            'dbHost'        => 'Database Host',
            'dbPort'        => 'Database Port',
            'dbUser'        => 'Database Username',
            'dbPass'        => 'Database Password',
            'dbName'        => 'Database Name',

            'appName'       => 'Application Name',
            'appProt'       => 'Application Protocol',
            'appUrl'        => 'Application URL (path to Polr; do not include http:// or trailing slash)',
            'advAnal'       => 'Advanced Analytics',
            'shortPerm'     => 'Shortening Permissions',

            'pubInt'        => 'Public Interface',
            'redir404'      => '404s and Disabled Short Links',
            'redirURL'      => 'Redirect URL',
            'pseudorEnding' => 'Default URL Ending Type',
            'baseEnd'       => 'URL Ending Base',

            'acctUsername'  => "Admin Username",
            'acctEmail'     => "Admin Email",
            'acctPassword'  => "Admin Password",


            'smptServer'    => 'SMTP Server',
            'smptPort'      => 'SMTP Port',
            'smptUsername'  => 'SMTP Username',
            'smptPassword'  => 'SMTP Password',
            'smptFrom'      => 'SMTP From',
            'smptFromName'  => 'SMTP From Name',

            'anonymousApi'  => 'Anonymous API',
            'anonymousApiQ' => 'Anonymous API Quota',
            'autoApiKey'    => 'Automatic API Assignment',

            'registrationPermission'    => 'Registration',
            'restrictEmailDomain'       => 'Restrict Registration Email Domains',
            'permittedEmailDomain'      => 'Permitted Email Domains',
            'passwordRecovery'          => 'Password Recovery',
            'registrationRecaptcha'     => 'Require reCAPTCHA for Registrations',
            'recapSiteKey'              => 'reCAPTCHA Site Key',
            'recapSiteSecret'           => 'reCAPTCHA Secret Key',

            'stylesheet'    => 'Theme (<a href="https://github.com/cydrobolt/polr/wiki/Themes-Screenshots" target="_blank">screenshots</a>)',
        ],

        'values' => [
            'advAnal' => [
                'enable'    => 'Enable advanced analytics',
                'disable'   => 'Disable advanced analytics',
            ],
            'shortPerm' => [
                'false'     => 'Anyone can shorten URLs',
                'true'      => 'Only logged in users may shorten URLs',
            ],
            'pubInt' => [
                'false'     => 'Redirect index page to redirect URL',
                'true'      => 'Show public interface (default)',
            ],
            'redir404' => [
                'false'     => 'Show an error message (default)',
                'true'      => 'Redirect to redirect URL',
            ],
            'pseudorEnding' => [
                'false'     => 'Use base62 or base32 counter (shorter but more predictable, e.g 5a)',
                'true'      => 'Use pseudorandom strings (longer but less predictable, e.g 6LxZ3j)',
            ],
            'baseEnd' => [
                '32'        => '32 -- lowercase letters & numbers (default)',
                '64'        => '62 -- lowercase, uppercase letters & numbers',
            ],
            'anonymousApi' => [
                'false'     => 'Off -- only registered users can use API',
                'true'      => 'On -- empty key API requests are allowed',
            ],
            'autoApiKey' => [
                'false'     => 'Off -- admins must manually enable API for each user',
                'true'      => 'On -- each user receives an API key on signup',
            ],
            'registrationPermission' => [
                'none'              => 'Registration disabled',
                'email'             => 'Enabled, email verification required',
                'no-verification'   => 'Enabled, no email verification required',
            ],
            'restrictEmailDomain' => [
                'false'     => 'Allow any email domain to register',
                'true'      => 'Restrict email domains allowed to register',
            ],
            'passwordRecovery' => [
                'false'     => 'Password recovery disabled',
                'true'      => 'Password recovery enabled',
            ],
            'registrationRecaptcha' => [
                'false'     => 'Do not require reCAPTCHA for registration',
                'true'      => 'Require reCATPCHA for registration',
            ],
        ],

        'popOvers' => [
            'dbName'                    => 'Name of existing database. You must create the Polr database manually.',
            'advAnal'                   => 'Enable advanced analytics to collect data such as referers, geolocation, and clicks over time. Enabling advanced analytics reduces performance and increases disk space usage.',
            'redirURL'                  => 'Required if you wish to redirect the index page or 404s to a different website. To use Polr, login by directly heading to yoursite.com/login first.',
            'pseudorEnding'             => 'If you choose to use pseudorandom strings, you will not have the option to use a counter-based ending.',
            'baseEnd'                   => 'This will have no effect if you choose to use pseudorandom endings.',
            'adminAccountSettings'      => 'These credentials will be used for your admin account in Polr.',
            'smtpSettings'              => 'Required only if the email verification or password recovery features are enabled.',
            'anonymousApiQ'             => 'API quota for non-authenticated users per minute per IP.',
            'registrationPermission'    => 'Enabling registration allows any user to create an account.',
            'restrictEmailDomain'       => 'Restrict registration to certain email domains.',
            'permittedEmailDomain'      => 'A comma-separated list of emails permitted to register.',
            'passwordRecovery'          => 'Password recovery allows users to reset their password through email.',
            'registrationRecaptcha'     => 'You must provide your reCAPTCHA keys to use this feature.',
            'reCapConfig'               => 'You must provide reCAPTCHA keys if you intend to use any reCAPTCHA-dependent features.',
        ],

        'notes' => [
            'redirURL'          => 'If a redirect is enabled, you will need to go to http://yoursite.com/login before you can access the index page.',
            'passwordRecovery'  => 'Please ensure SMTP is properly set up before enabling password recovery.',
            'recapSiteKey'      => 'You can obtain reCAPTCHA keys from <a href="https://www.google.com/recaptcha/admin">Google\'s reCAPTCHA website</a>.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Polr Messages Language Lines
    |--------------------------------------------------------------------------
    |
    */
    'errors' => [
        'setupForm' => [
            'appNameRequired'           => 'Application name is required.',
            'appProtocolRequired'       => 'Application protocol is required.',


            'regPermsRequired'          => 'Registration permissions are required.',
            'regPermsBool'              => 'Registration permissions must be set.',



            'invalidRegSettings'        => 'Invalid registration settings.',

            'diskWriteError'            => 'Could not write configuration to disk.',

        ],
        'general' => [
            'transactionUnauthorized'   => 'Transaction unauthorized.',
        ],
    ],


    /*
    |--------------------------------------------------------------------------
    | Polr Footer Language Lines
    |--------------------------------------------------------------------------
    |
    */
    'footer' => [
        'license'   => 'Polr is <a href="https://opensource.org/osd" target="_blank">open-source software</a> licensed under the <a href="//www.gnu.org/copyleft/gpl.html" target="_blank">GPLv2+ License</a>.',
        'version'   => 'Polr Version ' . config('polr.meta.version') . ' released ' . config('polr.meta.releaseMonth') . ' ' . config('polr.meta.releaseDay') . ',' . config('polr.meta.releaseYear') . ' - <a href="//github.com/cydrobolt/polr" target="_blank">Github</a>',
        'copyright' => '&copy; Copyright ' .config('polr.meta.releaseYear') . ' <a class="footer-link" href="//cydrobolt.com" target="_blank">Chaoyi Zha</a> &amp; <a class="footer-link" href="//github.com/Cydrobolt/polr/graphs/contributors" target="_blank">other Polr contributors</a>',
    ],

];
