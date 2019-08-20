<?php

namespace App\Models;

use App\Traits\DatabaseHelpersTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use DatabaseHelpersTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'email_verified_at',
        'password',
        'ip',
        'recovery_key',
        'role',
        'active',
        'api_key',
        'api_active',
        'api_quota',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Typecasted dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'              => 'string',
        'email'             => 'string',
        'password'          => 'string',
        'email_verified_at' => 'datetime',
        'username'          => 'string',
        'email'             => 'string',
        'email_verified_at' => 'datetime',
        'password'          => 'string',
        'ip'                => 'text',
        'recovery_key'      => 'string',
        'role'              => 'string',
        'active'            => 'string',
        'api_key'           => 'string',
        'api_active'        => 'boolean',
        'api_quota'         => 'string',
        'created_at'        => 'datetime',
        'updated_at'        => 'datetime',
        'deleted_at'        => 'datetime',
    ];

    /**
     * Scope a query the user names.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUserNames($query)
    {
        return $query->select('name')
                        ->distinct()
                        ->orderBy('name', 'asc');
    }
}
