<?php

namespace App\Http\Controllers;

use App\Helpers\CryptoHelper;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (config('polr.polrSetupRan') != true) {
            return redirect(route('setup'));
        }

        if (!config('polr.settingPublicInterface') && !self::isLoggedIn()) {
            if (config('polr.settingIndexRedirect')) {
                return redirect()->to(config('polr.settingIndexRedirect'));
            }
            else {
                return redirect()->to(route('login'));
            }
        }

        return view('index', ['large' => true]);
    }
}
