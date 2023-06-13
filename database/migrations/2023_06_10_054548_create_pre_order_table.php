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
        Schema::create('pre_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status', ['pending', 'waiting_payment', 'paid','expired'])->default('pending');
            $table->timestamps();
        });

        // Create Schedule to update status pre_order to expired while 1 day after created
        DB::unprepared('
            CREATE EVENT update_status_pre_order
            ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 1 DAY
            DO
                UPDATE pre_order SET status = "expired" WHERE status = "pending";
        ');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_order');
        // drop schedule
        DB::unprepared('DROP EVENT IF EXISTS update_status_pre_order');
        
    }
};
