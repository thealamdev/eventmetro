<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column: 'event_id')->constrained(table: 'events')->onDelete(action: 'cascade')->onUpdate(action: 'cascade');
            $table->string(column: 'session');
            $table->date(column: 'date');
            $table->time(column: 'start');
            $table->time(column: 'end');
            $table->string(column: 'location');
            $table->string(column: 'street');
            $table->string(column: 'state');
            $table->string(column: 'city');
            $table->string(column: 'zip');
            $table->string(column: 'long')->nullable()->default(value: 0);
            $table->string(column: 'lati')->nullable()->default(value: 0);
            $table->longText(column: 'agenda')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_schedules');
    }
};
