<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDouble('global_avg_price')->nullable()->default(0);
            $table->string('currency')->nullable()->default('EUR');
            $table->commonFields();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rices');
    }
}
