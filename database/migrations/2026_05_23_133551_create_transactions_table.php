<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->string('Transactionid')->unique(); 
            $table->string('nameTransaction');
            $table->integer('amount');
            $table->integer('tax');
            $table->enum('statustrans', ['pending', 'Paid', 'canceled']);
            $table->date('datetrans');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
