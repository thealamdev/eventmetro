<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventAgenda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'event_agendas';
    protected $guarded = ['id'];

    /**
     * Define relation associate with Image model
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(related: Image::class, name: 'image');
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
