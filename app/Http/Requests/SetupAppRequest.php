<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetupAppRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app:name'                              => 'required|max:255|string',
            'app:protocol'                          => 'required|max:255|string',
            'app:external_url'                      => 'required|max:255|string',
            'app:stylesheet'                        => 'nullable|max:255|string',
            'db:host'                               => 'required|max:255|string',
            'db:port'                               => 'nullable|digits_between:0,10|numeric',
            'db:name'                               => 'required|max:255|string',
            'db:username'                           => 'required|max:255|string',
            'db:password'                           => 'required|max:255|string',
            'setting:public_interface'              => 'required|boolean',
            'setting:acct_registration_recaptcha'   => 'required|boolean',
            'setting:recaptcha_site_key'            => 'nullable|max:255|string',
            'setting:recaptcha_secret_key'          => 'nullable|max:255|string',
            'acct:username'                         => 'required|max:255|string',
            'acct:email'                            => 'required|max:255|email',
            'acct:password'                         => 'required|max:255|string',
            'setting:registration_permission'       => 'required',
            'setting:shorten_permission'            => 'required|boolean',
            'setting:index_redirect'                => 'nullable|max:255|string',
            'setting:redirect_404'                  => 'required|boolean',
            'setting:password_recovery'             => 'required|boolean',
            'setting:restrict_email_domain'         => 'required|boolean',
            'setting:allowed_email_domains'         => 'nullable|max:500|string',
            'setting:base'                          => 'required|numeric',
            'setting:auto_api_key'                  => 'required|boolean',
            'setting:anon_api'                      => 'required|boolean',
            'setting:anon_api_quota'                => 'nullable|numeric',
            'setting:pseudor_ending'                => 'required|boolean',
            'setting:adv_analytics'                 => 'required|boolean',

            'app:smtp_server'                       => 'nullable|max:255|string',
            'app:smtp_port'                         => 'nullable|digits_between:0,10|numeric',
            'app:smtp_username'                     => 'nullable|max:255|string',
            'app:smtp_password'                     => 'nullable|max:255|string',
            'app:smtp_from'                         => 'nullable|max:255|string',
            'app:smtp_from_name'                    => 'nullable|max:255|string',



        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'app:name.required'                             => trans('polr.errors.setupForm.appNameRequired'),
            'app:protocol.required'                         => trans('polr.errors.setupForm.appProtocolRequired'),
            'setting:name.registration_permission.required' => trans('polr.errors.setupForm.regPermsRequired'),
        ];
    }
}
