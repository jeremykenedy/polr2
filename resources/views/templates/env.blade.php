APP_NAME="{{$APP_NAME}}"
APP_ENV=local
APP_KEY="{{{$APP_KEY}}}"
APP_DEBUG=true
APP_URL="{{$APP_URL}}"

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST="{{{$DB_HOST}}}"
DB_PORT={{$DB_PORT}}
DB_DATABASE="{{{$DB_DATABASE}}}"
DB_USERNAME="{{{$DB_USERNAME}}}"
DB_PASSWORD="{{{$DB_PASSWORD}}}"

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Set each to blank to disable mail
@if($MAIL_ENABLED)
MAIL_DRIVER=smtp
MAIL_HOST="{{$MAIL_HOST}}"
MAIL_PORT="{{$MAIL_PORT}}"
MAIL_USERNAME="{{$MAIL_USERNAME}}"
MAIL_PASSWORD="{{{$MAIL_PASSWORD}}}"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="{{$MAIL_FROM_ADDRESS}}"
MAIL_FROM_NAME="{{$MAIL_FROM_NAME}}"
@else
MAIL_DRIVER=null
MAIL_HOST=null
MAIL_PORT=null
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
@endif

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

# Polr Settings

APP_PROTOCOL="{{$APP_PROTOCOL}}"
APP_ADDRESS="{{$APP_ADDRESS}}"
APP_STYLESHEET="{{$APP_STYLESHEET}}"

# Set to true after running setup script
# e.g true
POLR_SETUP_RAN={{$POLR_SETUP_RAN}}

# Set to today's date (e.g November 3, 2015)
POLR_GENERATED_AT="{{$POLR_GENERATED_AT}}"

# Set to true to show an interface to logged off users
# If false, set the SETTING_INDEX_REDIRECT
# You may login by heading to /login if the public interface is off
SETTING_PUBLIC_INTERFACE={{$ST_PUBLIC_INTERFACE}}

# Set to true to allow signups, false to disable (e.g true/false)
POLR_ALLOW_ACCT_CREATION={{$POLR_ALLOW_ACCT_CREATION}}

# Set to true to require activation by email (e.g true/false)
POLR_ACCT_ACTIVATION={{$POLR_ACCT_ACTIVATION}}

# Set to true to require reCAPTCHAs on sign up pages
# If this setting is enabled, you must also provide your reCAPTCHA keys
# in POLR_RECAPTCHA_SITE_KEY and POLR_RECAPTCHA_SECRET_KEY
POLR_ACCT_CREATION_RECAPTCHA={{$POLR_ACCT_CREATION_RECAPTCHA}}

# Set to true to require users to be logged in before shortening URLs
SETTING_SHORTEN_PERMISSION={{$ST_SHORTEN_PERMISSION}}

# You must set SETTING_INDEX_REDIRECT if SETTING_PUBLIC_INTERFACE is false
# Polr will redirect logged off users to this URL
SETTING_INDEX_REDIRECT={{$ST_INDEX_REDIRECT}}

# Set to true if you wish to redirect 404s to SETTING_INDEX_REDIRECT
# Otherwise, an error message will be shown
SETTING_REDIRECT_404={{$ST_REDIRECT_404}}

# Set to true to enable password recovery
SETTING_PASSWORD_RECOV={{$ST_PASSWORD_RECOV}}

# Set to true to generate API keys for each user on registration
SETTING_AUTO_API={{$ST_AUTO_API}}

# Set to true to allow anonymous API access
SETTING_ANON_API={{$ST_ANON_API}}

# Set the anonymous API quota per IP
SETTING_ANON_API_QUOTA={{$ST_ANON_API_QUOTA}}

# Set to true to use pseudorandom strings rather than using a counter by default
SETTING_PSEUDORANDOM_ENDING={{$ST_PSEUDOR_ENDING}}

# Set to true to record advanced analytics
SETTING_ADV_ANALYTICS={{$ST_ADV_ANALYTICS}}

# Set to true to restrict registration to a specific email domain
SETTING_RESTRICT_EMAIL_DOMAIN={{$ST_RESTRICT_EMAIL_DOMAIN}}

# A comma-separated list of permitted email domains
SETTING_ALLOWED_EMAIL_DOMAINS="{{$ST_ALLOWED_EMAIL_DOMAINS}}"

# reCAPTCHA site key
POLR_RECAPTCHA_SITE_KEY="{{$POLR_RECAPTCHA_SITE_KEY}}"

# reCAPTCHA secret key
POLR_RECAPTCHA_SECRET_KEY="{{$POLR_RECAPTCHA_SECRET}}"

_API_KEY_LENGTH=15
_ANALYTICS_MAX_DAYS_DIFF=365
_PSEUDO_RANDOM_KEY_LENGTH=5

# Set to 32 or 62 -- do not touch after initial configuration
POLR_BASE={{$ST_BASE}}

# Do not touch
POLR_RELDATE="{{config('VERSION_RELMONTH')}} {{config('VERSION_RELDAY')}}, {{config('VERSION_RELYEAR')}}"
POLR_VERSION="{{config('VERSION')}}"
POLR_SECRET_BYTES=2

TMP_SETUP_AUTH_KEY="{{$TMP_SETUP_AUTH_KEY}}"
