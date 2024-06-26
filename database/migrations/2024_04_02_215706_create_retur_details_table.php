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
        Schema::create('retur_details', function (Blueprint $table) {
            $table->id();
            $table->integer('delivered_qty');
            $table->dateTime('verified_at')->nullable();
            $table->boolean('verified_status')->default(false);

            // Foreign Keys
            // Retur
            $table->foreignId('retur_id')->constrained('returs')->onUpdate('cascade')->onDelete('cascade');

            // Item
            $table->foreignId('item_id')->constrained('items')->onUpdate('cascade')->onDelete('cascade');

            // Employee
            $table->foreignId('verified_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retur_details');
    }
};
