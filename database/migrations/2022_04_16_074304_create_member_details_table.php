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
            $table->string('member_id');
            $table->string('member_expiry_date');
            $table->string('member_address'); 
            $table->string('member_gender');
            $table->string('member_date_of_birth');
            $table->string('member_phone_number');
            $table->string('member_status');
            $table->string('health_height')->default('');
            $table->string('health_weight')->default('');
            $table->string('health_waist')->default('');
            $table->string('health_remarks')->default('');
            $table->string('gym_id');
            $table->string('payment_id');
            $table->string('member_payment');
            $table->string('plan_id');
            $table->string('plan_amount');
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
