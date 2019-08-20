<?php

namespace App\Models;

use App\Traits\DatabaseHelpersTrait;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use DatabaseHelpersTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'links';

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
        'short_url',
        'long_url',
        'ip',
        'creator',
        'clicks',
        'secret_key',
        'is_disabled',
        'is_custom',
        'is_api',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'secret_key',
    ];

    /**
     * Typecasted dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Set crc32 hash and long_url
     * whenever long_url is set on a Link instance
     *
     * @param string $long_url
     */
    public function setLongUrlAttribute($long_url)
    {
        // Generate 32-bit unsigned integer crc32 value
        // Use sprintf to prevent compatibility issues with 32-bit systems
        // http://php.net/manual/en/function.crc32.php
        $crc32_hash = sprintf('%u', crc32($long_url));

        $this->attributes['long_url'] = $long_url;
        $this->attributes['long_url_hash'] = $crc32_hash;
    }

    /**
     * Allow quick lookups with Link::longUrl that make use
     * of the indexed crc32 hash to quickly fetch link
     *
     * @param  string $query
     * @param  string $long_url
     * @return string
     */
    public function scopeLongUrl($query, $long_url)
    {
        $crc32_hash = sprintf('%u', crc32($long_url));

        return $query
            ->where('long_url_hash', $crc32_hash)
            ->where('long_url', $long_url);
    }
}
