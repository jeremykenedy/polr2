@extends('layouts.minimal')

@section('title')
    Setup
@endsection

@section('css')
    <link href="{{ mix('css/setup.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="navbar fixed-top bg-dark navbar-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {!! trans('polr.title') !!}
            </a>
        </div>
    </div>

    <div class="container install-well mb-3 mb-sm-4 mb-md-5">
        <div class='offset-lg-2 col-lg-8 offset-xl-3 col-xl-6 card-well card-well-rounded'>

            <img class="mx-auto d-block mt-2 mb-5 setup-logo" src="/img/logo.png" alt="Polr Logo">

            <div class="row">
                <div class="col-sm-12">
                    @include('partials.form-status')
                </div>
            </div>

            <form class='setup-form' method='POST' action='/setup'>
                <h4>
                    {!! trans('polr.setupForm.titles.databaseConfiguration') !!}
                </h4>

                <div class="form-group has-feedback {{ session('errors') && $errors->has('db:host') ? ' has-error ' : '' }}">
                    <label for="host">
                        {!! trans('polr.setupForm.labels.dbHost') !!}:
                    </label>
                    <input type='text' class='form-control form-control-lg' name='db:host' id="host" value='localhost'>
                    @if (session('errors') && $errors->has('db:host'))
                        <div class="help-block">
                            <strong>{{ $errors->first('db:host') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-group has-feedback {{ session('errors') && $errors->has('db:port') ? ' has-error ' : '' }}">
                    <label for="port">
                        {!! trans('polr.setupForm.labels.dbPort') !!}:
                    </label>
                    <input type='text' class='form-control form-control-lg' name='db:port' id="port" value='3306'>
                    @if (session('errors') && $errors->has('db:port'))
                        <div class="help-block">
                            <strong>{{ $errors->first('db:port') }}</strong>
                        </div>
                    @endif
                </div>

                <label for="username">
                    {!! trans('polr.setupForm.labels.dbUser') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='db:username' id="username" value='homestead'>

                <label for="password">
                    {!! trans('polr.setupForm.labels.dbPass') !!}:
                </label>
                <input type='password' class='form-control form-control-lg' name='db:password' id="password" value='secret'>

                <label for="db_name">
                    {!! trans('polr.setupForm.labels.dbName') !!}:
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.dbName') !!}">?</button>
                </label>
                <input type='text' class='form-control form-control-lg' name='db:name' id="db_name" value="polr23">

                <h4>
                    {!! trans('polr.setupForm.titles.appSettings') !!}
                </h4>

                <label for="app_name">
                    {!! trans('polr.setupForm.labels.appName') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:name' id="app_name" value="{!! trans('polr.title') !!}">

                <label for="protocol">
                    {!! trans('polr.setupForm.labels.appProt') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:protocol' id="protocol" value='http://'>

                <label for="external_url">
                    {!! trans('polr.setupForm.labels.appUrl') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:external_url' id="external_url" placeholder="yoursite.com" value="polr2.local">

                <label for="adv_analytics">
                    {!! trans('polr.setupForm.labels.advAnal') !!}:
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.advAnal') !!}">?</button>
                </label>
                <select name='setting:adv_analytics' id="adv_analytics" class='form-control form-control-lg'>
                    <option value=0 selected='selected'>{!! trans('polr.setupForm.values.advAnal.disable') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.advAnal.enable') !!}</option>
                </select>

                <label for="shorten_permission">
                    {!! trans('polr.setupForm.labels.shortPerm') !!}:
                </label>

                <select name='setting:shorten_permission' id="shorten_permission" class='form-control form-control-lg'>
                    <option value=0 selected='selected'>{!! trans('polr.setupForm.values.shortPerm.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.shortPerm.true') !!}</option>
                </select>

                <label for="public_interface">
                    {!! trans('polr.setupForm.labels.pubInt') !!}:
                </label>
                <select name='setting:public_interface' id="public_interface" class='form-control form-control-lg'>
                    <option value=1 selected='selected'>{!! trans('polr.setupForm.values.pubInt.true') !!}</option>
                    <option value=0>{!! trans('polr.setupForm.values.pubInt.false') !!}</option>
                </select>

                <label for="redirect_404">
                    {!! trans('polr.setupForm.labels.redir404') !!}:
                </label>
                <select name='setting:redirect_404' id="redirect_404" class='form-control form-control-lg'>
                    <option value=0 selected='selected'>{!! trans('polr.setupForm.values.redir404.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.redir404.true') !!}</option>
                </select>

                <label for="index_redirect">
                    {!! trans('polr.setupForm.labels.redirURL') !!}:
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.redirURL') !!}">?</button>
                </label>
                <input type='text' class='form-control form-control-lg' name='setting:index_redirect' id="index_redirect" placeholder='http://your-main-site.com'>
                <p class='text-muted'>
                    {!! trans('polr.setupForm.notes.redirURL') !!}
                </p>

                <label for="pseudor_ending">
                    {!! trans('polr.setupForm.labels.pseudorEnding') !!}:
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.pseudorEnding') !!}">?</button>
                </label>
                <select name='setting:pseudor_ending' id="pseudor_ending" class='form-control form-control-lg'>
                    <option value=0 selected='selected'>{!! trans('polr.setupForm.values.pseudorEnding.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.pseudorEnding.true') !!}</option>
                </select>

                <label for="base">
                    {!! trans('polr.setupForm.labels.baseEnd') !!}:
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.baseEnd') !!}">?</button>
                </label>
                <select name='setting:base' id="base" class='form-control form-control-lg'>
                    <option value='32' selected='selected'>{!! trans('polr.setupForm.values.baseEnd.32') !!}</option>
                    <option value='64'>{!! trans('polr.setupForm.values.baseEnd.64') !!}</option>
                </select>

                <h4>
                    {!! trans('polr.setupForm.titles.adminAccountSettings') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.adminAccountSettings') !!}">?</button>
                </h4>

                <label for="acctUsername">
                    {!! trans('polr.setupForm.labels.baseEnd') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='acct:username' id="acctUsername" value='polr'>

                <label for="acctEmail">
                    {!! trans('polr.setupForm.labels.acctEmail') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='acct:email' id="acctEmail" value='polr@admin.tld'>

                <label for="acctPassword">
                    {!! trans('polr.setupForm.labels.acctPassword') !!}:
                </label>
                <input type='password' class='form-control form-control-lg' name='acct:password' id="acctPassword" value='polr'>

                <h4>
                    {!! trans('polr.setupForm.titles.smtpSettings') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.smtpSettings') !!}">?</button>
                </h4>

                <label for="smtp_server">
                    {!! trans('polr.setupForm.labels.smptServer') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:smtp_server' id="smtp_server" placeholder='smtp.gmail.com'>

                <label for="smtp_port">
                    {!! trans('polr.setupForm.labels.smptPort') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:smtp_port' id="smtp_port" placeholder='25'>

                <label for="smtp_username">
                    {!! trans('polr.setupForm.labels.smptUsername') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:smtp_username' id="smtp_username" placeholder='example@gmail.com'>

                <label for="smtp_password">
                    {!! trans('polr.setupForm.labels.smptPassword') !!}:
                </label>
                <input type='password' class='form-control form-control-lg' name='app:smtp_password' id="smtp_password" placeholder='password'>

                <label for="smtp_from">
                    {!! trans('polr.setupForm.labels.smptFrom') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:smtp_from' id="smtp_from" placeholder='example@gmail.com'>

                <label for="smtp_from_name">
                    {!! trans('polr.setupForm.labels.smptFromName') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='app:smtp_from_name' id="smtp_from_name" placeholder='noreply'>

                <h4>
                    {!! trans('polr.setupForm.titles.apiSettings') !!}
                </h4>

                <label for="anon_api">
                    {!! trans('polr.setupForm.labels.anonymousApi') !!}
                </label>
                <select name='setting:anon_api' id="anon_api" class='form-control form-control-lg'>
                    <option selected value=0>{!! trans('polr.setupForm.values.anonymousApi.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.anonymousApi.true') !!}</option>
                </select>

                <label for="anon_api_quota">
                    {!! trans('polr.setupForm.labels.anonymousApiQ') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.anonymousApiQ') !!}">?</button>
                </label>
                <input type='text' class='form-control form-control-lg' name='setting:anon_api_quota' id="anon_api_quota" placeholder='10'>

                <label for="auto_api_key">
                    {!! trans('polr.setupForm.labels.autoApiKey') !!}
                </label>
                <select name='setting:auto_api_key' id="auto_api_key" class='form-control form-control-lg'>
                    <option selected value=0>{!! trans('polr.setupForm.values.autoApiKey.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.autoApiKey.true') !!}</option>
                </select>

                <h4>
                    {!! trans('polr.setupForm.titles.otherSettings') !!}
                </h4>

                <label for="registration_permission">
                    {!! trans('polr.setupForm.labels.registrationPermission') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.registrationPermission') !!}">?</button>
                </label>
                <select name='setting:registration_permission' id="registration_permission" class='form-control form-control-lg'>
                    <option value='none'>{!! trans('polr.setupForm.values.registrationPermission.none') !!}</option>
                    <option value='email'>{!! trans('polr.setupForm.values.registrationPermission.email') !!}</option>
                    <option value='no-verification'>{!! trans('polr.setupForm.values.registrationPermission.no-verification') !!}</option>
                </select>

                <label for="restrict_email_domain">
                    {!! trans('polr.setupForm.labels.restrictEmailDomain') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.restrictEmailDomain') !!}">?</button>
                </label>
                <select name='setting:restrict_email_domain' id="restrict_email_domain" class='form-control form-control-lg'>
                    <option value=0>{!! trans('polr.setupForm.values.restrictEmailDomain.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.restrictEmailDomain.true') !!}</option>
                </select>

                <label for="allowed_email_domains">
                    {!! trans('polr.setupForm.labels.permittedEmailDomain') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.permittedEmailDomain') !!}">?</button>
                </label>
                <input type='text' class='form-control form-control-lg' name='setting:allowed_email_domains' id="allowed_email_domains" placeholder='company.com,company-corp.com'>

                <label for="password_recovery">
                    {!! trans('polr.setupForm.labels.passwordRecovery') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.passwordRecovery') !!}">?</button>
                </label>
                <select name='setting:password_recovery' id="password_recovery" class='form-control form-control-lg'>
                    <option value=0>{!! trans('polr.setupForm.values.passwordRecovery.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.passwordRecovery.true') !!}</option>
                </select>
                <p class='text-muted'>
                    {!! trans('polr.setupForm.notes.passwordRecovery') !!}
                </p>

                <label for="acct_registration_recaptcha">
                    {!! trans('polr.setupForm.labels.registrationRecaptcha') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.registrationRecaptcha') !!}">?</button>
                </label>
                <select name='setting:acct_registration_recaptcha' id="acct_registration_recaptcha" class='form-control form-control-lg'>
                    <option value=0>{!! trans('polr.setupForm.values.registrationRecaptcha.false') !!}</option>
                    <option value=1>{!! trans('polr.setupForm.values.registrationRecaptcha.true') !!}</option>
                </select>

                <h4>
                    {!! trans('polr.setupForm.titles.reCapConfig') !!}
                    <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="{!! trans('polr.setupForm.popOvers.reCapConfig') !!}">?</button>
                </h4>

                <label for="recaptcha_site_key">
                    {!! trans('polr.setupForm.labels.recapSiteKey') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='setting:recaptcha_site_key' id="recaptcha_site_key">

                <label for="recaptcha_secret_key">
                    {!! trans('polr.setupForm.labels.recapSiteSecret') !!}:
                </label>
                <input type='text' class='form-control form-control-lg' name='setting:recaptcha_secret_key' id="recaptcha_secret_key">

                <p class='text-muted'>
                    {!! trans('polr.setupForm.notes.recapSiteKey') !!}
                </p>

                <label for="stylesheet">
                    {!! trans('polr.setupForm.labels.stylesheet') !!}:
                </label>
                <select name='app:stylesheet' id="stylesheet" class='form-control form-control-lg'>
                    <option value=''>Modern (default)</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css'>Midnight Black</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css'>Orange</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/simplex/bootstrap.min.css'>Crisp White</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css'>Cloudy Night</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css'>Calm Skies</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css'>Google Material Design</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css'>Blue Metro</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css'>Sandstone</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css'>Newspaper</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/solar/bootstrap.min.css'>Solar</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css'>Cosmo</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css'>Flatly</option>
                    <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css'>Yeti</option>
                </select>

                <div class="row mb-4 mt-4">
                    <div class="col-sm-4 offset-sm-2 mt-3">
                        <input type='submit' class='btn btn-success btn-md btn-block text-white' value='Install'>
                    </div>
                    <div class="col-sm-4 mt-3">
                        <input type='reset' class='btn btn-danger btn-md btn-block' value='Clear Fields'>
                    </div>
                </div>

                <input type="hidden" name='_token' value='{{csrf_token()}}' />

            </form>
        </div>
    </div>

    <footer>
        <div class="card-well text-center">
            <p>
                {!! trans('polr.footer.license') !!}
                <br />
                {!! trans('polr.footer.version') !!}
            </p>
            <p class="footer-link">
                {!! trans('polr.footer.copyright') !!}
            </p>
        </div>
    </footer>

@endsection

@push('js')
    @include('partials.popover')
@endpush
