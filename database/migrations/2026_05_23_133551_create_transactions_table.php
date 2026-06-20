<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {

<<<<<<< HEAD
            $table->string('transaction_code')->unique();
=======
            $table->string('id')->primary();

            $table->id();

            $table->string('transaction_code')->unique();
            $table->string('Transactionid')->unique();

>>>>>>> 320c47c99bfbc16889c9f11a1c1357ae3eede3a5
            $table->string('name');
            $table->integer('amount');
            $table->integer('tax');
            $table->enum('status', ['pending', 'paid', 'completed']);
            $table->date('date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
