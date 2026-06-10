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
            $table->timestamps();

            $table->string('Transactionid')->unique();
            $table->string('name');
            $table->integer('amount');
            $table->integer('tax');
            $table->enum('status', ['pending', 'paid', 'completed']);
            $table->date('date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
