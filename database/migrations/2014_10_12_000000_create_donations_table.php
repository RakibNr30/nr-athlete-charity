<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedDouble('donate_amount')->nullable()->default(0);
            $table->unsignedDouble('rice_donate_amount')->nullable()->default(0);
            $table->unsignedBigInteger('donner_id')->nullable();
            $table->string('activity_id')->nullable();
            $table->unsignedBigInteger('case_id')->nullable();
            $table->string('token')->nullable();
            $table->string('payer_id')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
