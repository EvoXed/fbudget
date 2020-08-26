<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_account_id')->nullable();
            $table->foreign('from_account_id')->references('id')->on('accounts');
            $table->unsignedBigInteger('to_account_id')->nullable();
            $table->foreign('to_account_id')->references('id')->on('accounts');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('payee_id')->nullable();
            $table->foreign('payee_id')->references('id')->on('payee');
            $table->string('note', 50)->nullable();
            $table->integer('from_amount')->default(0);
            $table->integer('to_amount')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
