<?php

use App\Enums\DatabaseStatus;
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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'title');
            $table->string(column: 'description', length: 150);
            $table->longText(column: 'details');
            $table->foreignId(column: 'organizer_id')->constrained(table: 'users')->onUpdate(action: 'cascade')->onDelete(action: 'cascade');
            $table->unsignedBigInteger(column: 'category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean(column: 'status')->default(value: DatabaseStatus::DRAFT->value);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
