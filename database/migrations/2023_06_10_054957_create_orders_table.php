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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('detail_order_id')->nullable();
            $table->unsignedBigInteger('pre_order_id');
            $table->integer('number_of_ticket');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->timestamps();
        });

        Schema::table('orders', function (Blueprint $table){
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('pre_order_id')->references('id')->on('pre_order');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // Triger update pendaftar on events
        DB::unprepared('
            CREATE TRIGGER update_pendaftar
            AFTER INSERT ON orders
            FOR EACH ROW
            BEGIN
                UPDATE events SET pendaftar = pendaftar + NEW.number_of_ticket WHERE id = NEW.event_id;
                UPDATE pre_order SET status = "waiting_payment" WHERE id = NEW.pre_order_id;
            END
        ');

        // trigger update pre_order.status while order have payment id
        DB::unprepared('
            CREATE TRIGGER update_pre_order_status
            AFTER UPDATE ON orders
            FOR EACH ROW
            BEGIN
                IF NEW.payment_id IS NOT NULL THEN
                    UPDATE pre_order SET status = "paid" WHERE id = NEW.pre_order_id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');

        // Dropp function
        DB::unprepared('DROP TRIGGER IF EXISTS update_pendaftar');
    }
};
