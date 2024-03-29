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
        Schema::create('sales_details', function (Blueprint $table) {
            $table->id();
            $table->string('kode_item');
            $table->integer('harga');
            $table->integer('potongan_manual')->default(0);
            $table->float('diskon')->default(0.00);
            $table->integer('qty')->default(1);

            $table->foreignId('sales_master_id')->constrained('sales_masters')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('branch_item_id')->constrained('branch_items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('po_detail_id')->constrained('purchase_order_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('coa_id')->constrained('coas')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_details');
    }
};
