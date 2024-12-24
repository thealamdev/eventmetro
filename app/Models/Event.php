<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define table 
     * @var string
     */
    protected $table = 'events';

    /**
     * Define fillable property
     * @var array
     */
    protected $fillable = ['title', 'description', 'details', 'organizer_id', 'category_id', 'status'];

    /**
     * Get all resources associate with this model
     * @return HasMany
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(related: EventSchedule::class, foreignKey: 'event_id', localKey: 'id');
    }

    /**
     * Get all resources associate with this model
     * @return HasMany
     */
    public function agendas(): HasMany
    {
        return $this->hasMany(related: EventAgenda::class, foreignKey: 'event_id', localKey: 'id');
    }

    /**
     * Get all resources associate with this model
     * @return HasMany
     */
    public function faqs(): HasMany
    {
        return $this->hasMany(related: EventFAQ::class, foreignKey: 'event_id', localKey: 'id');
    }

    /**
     * Define boot functionalities
     * @return void
     */
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
