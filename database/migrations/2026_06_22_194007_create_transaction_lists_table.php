<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaction_lists', function (Blueprint $table) {
            $table->id();

            $table->string('Transactionid');
            $table->string('Receiptid');
            $table->string('Cashier_id')->nullable();
            $table->string('Cashier_name');
            $table->string('Store_id')->nullable();
            $table->string('Description');
            $table->integer('Quantity');
            $table->integer('Total');
            $table->timestamps();

            $table->foreign('Transactionid')
                    ->references('Transactionid')
                    ->on('transactions')
                    ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaction_lists');
    }
};
