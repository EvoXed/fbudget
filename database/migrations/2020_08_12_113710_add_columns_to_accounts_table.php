<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('issuer', 25)->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_include_into_totals')->default(1);
            $table->integer('total_limit')->default(0);
            $table->string('card_issuer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn(
                'issuer',
                'is_active',
                'is_include_into_totals',
                'total_limit',
                'card_issuer'
            );
        });
    }
}
