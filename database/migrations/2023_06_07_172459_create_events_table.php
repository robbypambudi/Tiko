<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->decimal('price', 12, 2);
            $table->integer('capacity');
            $table->integer('pendaftar')->nullable()->default(0);
            $table->unsignedBigInteger('detail_event_id')->nullable();
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Create trigger update performace date on guest star 
        DB::unprepared('
            CREATE TRIGGER update_performance_date
            AFTER UPDATE ON events
            FOR EACH ROW
            BEGIN
                UPDATE guest_star SET performance_date = NEW.date WHERE event_id = NEW.id;
            END
        ');

        // Function to check if event is full

        DB::unprepared('
            CREATE FUNCTION is_full(event_id INT) RETURNS BOOLEAN
            BEGIN
                DECLARE capacity INT;
                DECLARE pendaftar INT;
                DECLARE is_full BOOLEAN;
                SELECT capacity INTO capacity FROM events WHERE id = event_id;
                SELECT pendaftar INTO pendaftar FROM events WHERE id = event_id;
                IF pendaftar >= capacity THEN
                    SET is_full = TRUE;
                ELSE
                    SET is_full = FALSE;
                END IF;
                RETURN is_full;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS is_full');
        DB::unprepared('DROP TRIGGER IF EXISTS update_performance_date');
        Schema::dropIfExists('event');
    }
};
