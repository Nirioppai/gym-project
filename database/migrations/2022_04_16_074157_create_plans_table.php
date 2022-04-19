<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('PLAN_ID');
            $table->string('PLAN_NAME');
            $table->string('PLAN_DESCRIPTION');
            $table->string('PLAN_VALIDITY'); // days
            $table->string('PLAN_AMOUNT'); // php
            $table->string('PLAN_STATUS');
            $table->string('GYM_ID');
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
        Schema::dropIfExists('plans');
    }
};
