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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('log');
            $table->string('user_id');
            $table->string('description');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER log_after_insert AFTER INSERT ON `users` FOR EACH ROW
            BEGIN
                INSERT INTO logs (log, user_id, description, created_at, updated_at) VALUES ("INSERT", NEW.id, "User created", now(), now());
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
