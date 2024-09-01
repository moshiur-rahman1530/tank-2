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
        Schema::create('lcs', function (Blueprint $table) {
            $table->id();
            $table->string('lc_no');
            $table->string('lc_date');
            $table->string('lc_type');
            $table->string('consignee_name');
            $table->string('beneficiary');
            $table->string('lc_expired_date');
            $table->string('last_ship_date');
            $table->string('product');
            $table->string('qtn');
            $table->string('price');
            $table->string('origin');
            $table->string('destination');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lcs');
    }
};