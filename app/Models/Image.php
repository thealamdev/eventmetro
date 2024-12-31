<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public static function create(array $array)
    {
    }

    /**
     * Define relation associate with Image model
     * @return MorphTo
     */
    public function image(): MorphTo
    {
        return $this->morphTo();
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::forget("name_list");
        });

        static::updated(function () {
            Cache::forget("name_list");
        });
    }
}
