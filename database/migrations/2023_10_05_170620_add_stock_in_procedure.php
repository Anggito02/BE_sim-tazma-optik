<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE IF NOT EXISTS add_stock_in_procedure(
                IN kode_item VARCHAR(255),
                IN bulan INT,
                IN tahun INT,
                IN stok_in_total INT,
                IN item_id BIGINT,
                IN purchase_order_id BIGINT,
                IN receive_order_id BIGINT
            )
            BEGIN
                INSERT INTO stock_in_logs (
                    kode_item,
                    bulan,
                    tahun,
                    stok_total,
                    stok_in_total,
                    item_id
                )
                VALUES (
                    kode_item,
                    bulan,
                    tahun,
                    stok_in_total,
                    stok_in_total,
                    item_id
                );
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `add_stock_in_procedure`');
    }
};
