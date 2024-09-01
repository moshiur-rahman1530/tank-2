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
        Schema::create('tanks', function (Blueprint $table) {
            $table->id();
            $table->string('tank_number');
            $table->string('tank_owner');
            $table->string('manufacturing_date');
            $table->string('current_po_certificate');
            $table->string('certificate_name');
            $table->string('certificate_cost');
            $table->string('last_test_date');
            $table->string('expired_date');
            // $table->string('no_of_test');
            // $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanks');
    }
};