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

            $table->string('Transactionid')->unique(); #harus unik tidak boleh sama
            $table->string('name');
            $table->integer('amount');
            $table->integer('tax');
            $table->enum('status', ['pending', 'paid', 'free', 'completed']);
            $table->date('date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
