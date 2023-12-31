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
        Schema::create('item_price_loggings', function (Blueprint $table) {
            $table->id();
            $table->enum('tipe_harga_berubah', ['harga_beli', 'harga_jual']);
            $table->dateTime('tanggal_berubah');
            $table->bigInteger('harga_lama');
            $table->bigInteger('harga_baru');
            $table->enum('metode_perubahan', ['manual', 'purchase_order']);

            // Foreign Keys
            // Item
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade')->onUpdate('cascade');

            // Purchase Order
            $table->foreignId('purchase_order_id')->nullable()->constrained('purchase_orders')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_price_loggings');
    }
};
