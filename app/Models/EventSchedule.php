<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class EventSchedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function speakers()
    {
        return $this->hasMany(EventSpeaker::class, 'schedule_id', 'id');
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
