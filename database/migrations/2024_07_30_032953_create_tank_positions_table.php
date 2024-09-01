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
        Schema::create('tank_positions', function (Blueprint $table) {
            $table->id();
            // $table->string('shipment_id');
            $table->string('tank_number');
            $table->string('lc_no');
            $table->string('consignee_name');
            $table->string('origin');
            $table->string('destination');
            $table->string('etd_to_final_dest');
            $table->string('eta_to_final_dest');
            $table->string('loading_date');
            $table->string('connecting_port_name');
            $table->string('arrived_at_connecting_port');
            $table->string('sail_to_dest_port');
            $table->string('arrived_at_dest_port');
            $table->string('arrival_at_customer');
            $table->string('arrive_to_agent_warehouse');
            $table->string('loading_port');
            $table->string('sail_to_conneting');
            $table->string('arrive_at_conneting');
            $table->string('sail_to_dest');
            $table->string('arrived_at_dest');
            $table->string('arrived_at_warehouse');
            $table->string('tank_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tank_positions');
    }
};