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
        Schema::create('ticket_packages', function (Blueprint $table) {
            $table->increments('ticketid');
            $table->string('package_code');
            $table->string('package');
            $table->date('date_range');
            $table->date('expiration_date');
            $table->time('granttime');
            $table->time('expiry');
            $table->string('retail_price')->nullable();
            $table->string('combo_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_packages');
    }
};
