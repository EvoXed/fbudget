<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->boolean('is_default')->default(0);
            $table->tinyInteger('decimals')->default(2);
            $table->char('decimal_separator');
            $table->char('group_separator');
            $table->enum('symbol_format', ['RS','LS'])->default('RS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {
            $table->dropColumn('is_default',
                'decimals',
                'decimal_separator',
                'group_separator',
                'symbol_format'
            );
        });
    }
}
