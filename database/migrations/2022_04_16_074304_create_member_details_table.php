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
        Schema::create('member_details', function (Blueprint $table) {
            $table->id();
            $table->string('MEMBER_ID');
            $table->string('MEMBER_EXPIRY_DATE');
            $table->string('MEMBER_ADDRESS'); 
            $table->string('MEMBER_GENDER');
            $table->string('MEMBER_DATE_OF_BIRTH');
            $table->string('MEMBER_PHONE_NUMBER');
            $table->string('MEMBER_STATUS');
            $table->string('GYM_ID');
            $table->string('PAYMENT_ID');
            $table->string('MEMBER_PAYMENT');
            $table->string('PLAN_ID');
            $table->string('PLAN_AMOUNT');
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
        Schema::dropIfExists('member_details');
    }
};
