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
        Schema::create('guest_star', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->time('performance_time');
            $table->unsignedBigInteger('artist_id');
            $table->timestamps();
        });

        Schema::table('guest_star', function (Blueprint $table){
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('artist_id')->references('id')->on('artists');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_star');
    }
};
