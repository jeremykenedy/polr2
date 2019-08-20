<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupAppRequest;
use App\Traits\CryptoHelperTrait;
use App\Traits\UserHelperTrait;
use Cache;
use Cookie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


// use Dotenv;
use Dotenv\Dotenv;
use Illuminate\Foundation\Bootstrap\LoadConfiguration;
use \Illuminate\Database\DatabaseManager;
// use Dotenv;
use InvalidArgumentException;


class SetupController extends Controller
{
    use CryptoHelperTrait;
    use UserHelperTrait;

    private $blankEnvFile;
    private $envFile;
    private $setupCookieName;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->blankEnvFile = base_path('.env.example');
        $this->envFile = base_path('.env');
        $this->setupCookieName = 'setup_arguments';
    }

    /**
     * [setupAlreadyRan description]
     *
     * @return view
     */
    private function setupAlreadyRan()
    {
        abort(404);
    }

    /**
     * [checkRegistrationSettings description]
     *
     * @param  [type] $polr_registration_setting [description]
     *
     * @return [type]                            [description]
     */
    private function checkRegistrationSettings($polr_registration_setting)
    {
        if ($polr_registration_setting == 'no-verification') {
            $polr_acct_activation       = 0;
            $polr_allow_acct_creation   = 1;
        }
        else if ($polr_registration_setting == 'none') {
            $polr_acct_activation       = 0;
            $polr_allow_acct_creation   = 0;
        }
        else if ($polr_registration_setting == 'email') {
            $polr_acct_activation       = 1;
            $polr_allow_acct_creation   = 1;
        } else {
            return $registrationSettings = [
                'error' => 1,
            ];
        }

        return $registrationSettings = [
            'error'                     => 0,
            'polr_acct_activation'      => $polr_acct_activation,
            'polr_allow_acct_creation'  => $polr_allow_acct_creation,
        ];
    }

    /**
     * Set the default time zone
     *
     * @param string $zone
     *
     * @return void
     */
    private function setDefaultTimeZone($zone = 'UTC')
    {
        date_default_timezone_set($zone);
    }

    /**
     * Unset Cookie
     *
     * @param $cookie
     *
     * @return void
     */
    private function unSetCookie($cookie = null)
    {
        if(!$cookie) {
            $cookie = $this->setupCookieName;
        }
        setcookie($cookie, '', time()-3600);
        Cookie::forget($cookie);
        Cookie::queue(Cookie::forget($cookie));
    }

    /**
     * Parse the exit code
     *
     * @param  int $exitCode
     *
     * @return return boolean
     */
    private function parseExitCode($exitCode)
    {
        if ($exitCode == 1) {
            return true;
        }
        return false;
    }

    /**
     * Run the Database Migrations
     *
     * @return boolean
     */
    private function checkDatabaseConnection()
    {




        // $exitCode = true;
        // try {
        //     DB::connection()->getDoctrineConnection()->close();
        //     DB::reconnect()->getPdo();
        // } catch (\Exception $e) {
        //     $exitCode = false;
        // }
        // return $exitCode;



    // Cache::flush();
    // Artisan::call('config:clear');
    // Artisan::call('cache:clear');
    // Artisan::call('route:clear');
    // Artisan::call('view:clear');
    // Artisan::call('config:cache');
    // \Session::flush();
    // \Session::forget('error');
    // DB::disconnect();

// exec('php artisan optimize');

// try {
//     Dotenv::makeMutable();
//     Dotenv::load(app()->environmentPath(), app()->environmentFile());
//     Dotenv::makeImmutable();
// } catch (InvalidArgumentException $e) {
//     //
// }

// with(new Dotenv(app()->environmentPath(), app()->environmentFile()))->overload();
// with(new LoadConfiguration())->bootstrap(app());


        $exitCode = 1;

        try {


            // DB::connection()->getDoctrineConnection()->close();
            // DB::reconnect()->getPdo();

            $exitCode = Artisan::call('migrate', [
                '--force' => true,
            ]);

        } catch (\Exception $e) {

            $exitCode = 1;

            // return redirect()
            //         ->back()
            //         ->with('error', 'damn?')
            //         ->withInput();

// dd($exitCode);

        }


            // dd($exitCode);

        return $exitCode;
        // dd($exitCode);
        // return self::parseExitCode($exitCode);


    }

    /**
     * Migrate the database
     *
     * @return void
     */
    private function migrateDatabase()
    {
        Artisan::call('migrate', [
            '--force' => true,
        ]);
    }

    private function setupEnvFile($validatedData)
    {
        $date_today                     = date('F jS, Y');
        $mail_enabled                   = false;
        $app_key                        = config('app.key');
        $polr_setup_ran                 = 'false';
        $setup_auth_key                 = $this->generateRandomHex(64);
        $app_name                       = $validatedData['app:name'];
        $app_protocol                   = $validatedData['app:protocol'];
        $app_address                    = $validatedData['app:external_url'];
        $app_stylesheet                 = $validatedData['app:stylesheet'];
        $db_host                        = $validatedData['db:host'];
        $db_port                        = $validatedData['db:port'];
        $db_name                        = $validatedData['db:name'];
        $db_username                    = $validatedData['db:username'];
        $db_password                    = $validatedData['db:password'];
        $st_public_interface            = $validatedData['setting:public_interface'];
        $polr_registration_setting      = $validatedData['setting:registration_permission'];
        $polr_acct_creation_recaptcha   = $validatedData['setting:acct_registration_recaptcha'];
        $polr_recaptcha_site_key        = $validatedData['setting:recaptcha_site_key'];
        $polr_recaptcha_secret_key      = $validatedData['setting:recaptcha_secret_key'];
        $acct_username                  = $validatedData['acct:username'];
        $acct_email                     = $validatedData['acct:email'];
        $acct_password                  = $validatedData['acct:password'];

        $acct_roles                     = $this->getUserRoles();
        $acct_group                     = $acct_roles['admin'];

        $registrationSettings = $this->checkRegistrationSettings($polr_registration_setting);
        if($registrationSettings['error'] === 1) {
            return redirect()
                    ->back()
                    ->with('error', trans('polr.errors.setupForm.invalidRegSettings'));
        }
        $polr_acct_activation       = $registrationSettings['polr_acct_activation'];
        $polr_allow_acct_creation   = $registrationSettings['polr_allow_acct_creation'];

        // if true, only logged in users can shorten
        $st_shorten_permission          = $validatedData['setting:shorten_permission'];
        $st_index_redirect              = $validatedData['setting:index_redirect'];
        $st_redirect_404                = $validatedData['setting:redirect_404'];
        $st_password_recov              = $validatedData['setting:password_recovery'];
        $st_restrict_email_domain       = $validatedData['setting:restrict_email_domain'];
        $st_allowed_email_domains       = $validatedData['setting:allowed_email_domains'];

        $st_base                        = $validatedData['setting:base'];
        $st_auto_api_key                = $validatedData['setting:auto_api_key'];
        $st_anon_api                    = $validatedData['setting:anon_api'];
        $st_anon_api_quota              = $validatedData['setting:anon_api_quota'];
        $st_pseudor_ending              = $validatedData['setting:pseudor_ending'];
        $st_adv_analytics               = $validatedData['setting:adv_analytics'];

        $mail_host                      = $validatedData['app:smtp_server'];
        $mail_port                      = $validatedData['app:smtp_port'];
        $mail_username                  = $validatedData['app:smtp_username'];
        $mail_password                  = $validatedData['app:smtp_password'];
        $mail_from                      = $validatedData['app:smtp_from'];
        $mail_from_name                 = $validatedData['app:smtp_from_name'];
        if ($mail_host) {
            $mail_enabled               = true;
        }
        $app_url                        = $app_protocol . $app_address;

        $compiled_configuration = view('templates.env', [
            'APP_NAME'                      => $app_name,
            'APP_KEY'                       => $app_key,
            'APP_PROTOCOL'                  => $app_protocol,
            'APP_ADDRESS'                   => $app_address,
            'APP_URL'                       => $app_url,
            'APP_STYLESHEET'                => $app_stylesheet,
            'POLR_GENERATED_AT'             => $date_today,
            'POLR_SETUP_RAN'                => $polr_setup_ran,
            'DB_HOST'                       => $db_host,
            'DB_PORT'                       => $db_port,
            'DB_USERNAME'                   => $db_username,
            'DB_PASSWORD'                   => $db_password,
            'DB_DATABASE'                   => $db_name,
            'ST_PUBLIC_INTERFACE'           => $st_public_interface,
            'POLR_ALLOW_ACCT_CREATION'      => $polr_allow_acct_creation,
            'POLR_ACCT_ACTIVATION'          => $polr_acct_activation,
            'POLR_ACCT_CREATION_RECAPTCHA'  => $polr_acct_creation_recaptcha,
            'ST_SHORTEN_PERMISSION'         => $st_shorten_permission,
            'ST_INDEX_REDIRECT'             => $st_index_redirect,
            'ST_REDIRECT_404'               => $st_redirect_404,
            'ST_PASSWORD_RECOV'             => $st_password_recov,
            'ST_RESTRICT_EMAIL_DOMAIN'      => $st_restrict_email_domain,
            'ST_ALLOWED_EMAIL_DOMAINS'      => $st_allowed_email_domains,
            'POLR_RECAPTCHA_SITE_KEY'       => $polr_recaptcha_site_key,
            'POLR_RECAPTCHA_SECRET'         => $polr_recaptcha_secret_key,
            'MAIL_ENABLED'                  => $mail_enabled,
            'MAIL_HOST'                     => $mail_host,
            'MAIL_PORT'                     => $mail_port,
            'MAIL_USERNAME'                 => $mail_username,
            'MAIL_PASSWORD'                 => $mail_password,
            'MAIL_FROM_ADDRESS'             => $mail_from,
            'MAIL_FROM_NAME'                => $mail_from_name,
            'ST_BASE'                       => $st_base,
            'ST_AUTO_API'                   => $st_auto_api_key,
            'ST_ANON_API'                   => $st_anon_api,
            'ST_ANON_API_QUOTA'             => $st_anon_api_quota,
            'ST_PSEUDOR_ENDING'             => $st_pseudor_ending,
            'ST_ADV_ANALYTICS'              => $st_adv_analytics,
            'TMP_SETUP_AUTH_KEY'            => $setup_auth_key,
        ])->render();

        $handle = fopen(base_path('.env'), 'w');

        if (fwrite($handle, $compiled_configuration) === FALSE) {
            return redirect()
                    ->back()
                    ->with('error', trans('polr.errors.setupForm.diskWriteError'));
        }



        $setup_finish_arguments = json_encode([
            'acct_username'     => $acct_username,
            'acct_email'        => $acct_email,
            'acct_password'     => $acct_password,
            'setup_auth_key'    => $setup_auth_key
        ]);

        // set cookie with information needed for finishSetup, expire in 60 seconds
        // we use PHP's setcookie rather than Laravel's cookie capabilities because
        // our app key changes and Laravel encrypts cookies.
        setcookie($this->setupCookieName, $setup_finish_arguments, time()+60);

        fclose($handle);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (config('polr.polrSetupRan')) {
            return $this->setupAlreadyRan();
        }

        return view('setup');
    }

    public function performSetup(SetupAppRequest $request)
    {
        if (config('polr.polrSetupRan')) {
            return $this->setupAlreadyRan();
        }

        $validatedData = $request->validated();

        $this->setDefaultTimeZone();
        $this->setupEnvFile($validatedData);
        // $this->flushSystem();


// $request->session()->forget('error');
// $request->session()->forget('success');

// Cache::flush();
// Artisan::call('config:clear');
// Artisan::call('cache:clear');
// Artisan::call('route:clear');
// Artisan::call('view:clear');
// Artisan::call('config:cache');
// \Session::flush();
// DB::disconnect();

        $databaseCreationCheck = $this->checkDatabaseConnection();

// return redirect('setup')
//             ->with('error', 'wjat?');


// \Session::flush();

// \Session::forget('error');

// $value = $request->session()->pull('key', 'default');




        if ($databaseCreationCheck === 1) {
            // $this->resetEnvFile();
            // $this->flushSystem();
            // dd('nope');

// dd($databaseCreationCheck);

// return redirect()->back()->withErrors(':(');



// return redirect('setup')
            // ->with('error', 'Could not create database. Perhaps your credentials were incorrect?');

// dd('error');

// $value = session('error');

// return redirect()->back()->withErrors(':(');

dd('failed');

            // session(['error' => 'Could not create database. Perhaps your credentials were incorrect?']);
            return redirect('setup')->with('error', '');

// dd('error');

// dd($value);

        } else {

// dd('success');

dd('success');

            // session(['success' => 'Connected!']);
            return redirect('setup');

            return redirect()->back()->withSuccess(':)');

        }

        $this->migrateDatabase();

        dd($databaseCreationCheck);

        // $this->setupEnvFile($validatedData, true);

        return redirect(route('finishSetup'));
    }


private function flushSystem()
{
    // Cache::flush();
    // Artisan::call('config:clear');
    // Artisan::call('cache:clear');
    // Artisan::call('route:clear');
    // Artisan::call('view:clear');
    // Artisan::call('config:cache');
    // \Session::flush();
    // DB::disconnect();
}

private function resetEnvFile()
{
    if(file_exists($this->envFile)){
        unlink($this->envFile);
        copy($this->blankEnvFile, $this->envFile);
    }
}

    /**
     * [finishSetup description]
     *
     * @param  Request $request [description]
     *
     * @return [type]           [description]
     */
    public function finishSetup(Request $request)
    {


        // get data from cookie, decode JSON
        if (!isset($_COOKIE[$this->setupCookieName])) {
            return redirect('setup');
        }

        $setup_finish_args_raw      = $_COOKIE[$this->setupCookieName];
        $setup_finish_args          = json_decode($setup_finish_args_raw);
        $transaction_authorized     = config('polr.meta.setupAuthKey') == $setup_finish_args->setup_auth_key;

        if ($transaction_authorized != true) {
            abort(403, trans('polr.errors.general.transactionUnauthorized'));
        }

        // unset cookie
        $this->unSetCookie();
        $request->session()->flush();




        dd('made it!');

    }
}
