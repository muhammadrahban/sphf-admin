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
        Schema::create('donation_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_id')->constrained()->onDelete('cascade');
            $table->bigInteger('user_id');
            $table->bigInteger('victim_id');
            $table->double('amount');
            $table->double('charges');
            $table->double('total_amount');
            $table->double('charged_amount');
            $table->enum('transaction_type',['dod','card','obt']);
            $table->string('check_no')->nullable();
            $table->string('card')->nullable();
            $table->string('cvv')->nullable();
            $table->string('cardholder_first_name')->nullable();
            $table->string('cardholder_last_name')->nullable();
            $table->string('bank')->nullable();
            $table->string('iban')->nullable();
            $table->string('account_title')->nullable();
            $table->string('bank_routing_number')->nullable();
            $table->enum('transaction_status',['pending','completed','declined']);
            $table->string('payment_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_invoices');
    }
};
