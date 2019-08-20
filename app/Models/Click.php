<?php

namespace App\Models;

use App\Traits\DatabaseHelpersTrait;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use DatabaseHelpersTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clicks';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

}
