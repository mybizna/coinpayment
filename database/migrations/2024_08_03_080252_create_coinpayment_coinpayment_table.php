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
        Schema::create('coinpayment_coinpayment', function (Blueprint $table) {
            $table->id();

            $table->string('txn_id')->nullable();
            $table->string('ipn_version')->nullable();
            $table->string('ipn_type')->nullable();
            $table->string('ipn_mode')->nullable();
            $table->string('ipn_id')->nullable();
            $table->string('merchant')->nullable();
            $table->string('item_name')->nullable();
            $table->string('item_number')->nullable();
            $table->string('amount')->nullable();
            $table->string('amounti')->nullable();
            $table->string('currency')->nullable();
            $table->string('status')->nullable();
            $table->string('status_text')->nullable();
            $table->foreignId('partner_id')->nullable();
            $table->foreignId('payment_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coinpayment_coinpayment');
    }
};
