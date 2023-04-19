<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Money\Currency;
use Money\Currencies\ISOCurrencies;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->string('code', 3)->primary();
            $table->string('name');
            $table->string('symbol', 5)->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('currencies');
    }
}

