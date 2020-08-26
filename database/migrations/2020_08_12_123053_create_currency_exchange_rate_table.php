<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencyExchangeRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_exchange_rate', function (Blueprint $table) {
            $table->unsignedBigInteger('from_currency_id')->nullable();
            $table->foreign('from_currency_id')->references('id')->on('currencies');
            $table->unsignedBigInteger('to_currency_id')->nullable();
            $table->foreign('to_currency_id')->references('id')->on('currencies');
            $table->timestamp('rate_date')->nullable();
            $table->double('rate')->default(0);
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
        Schema::dropIfExists('currency_exchange_rate');
    }
}
