<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW view_plan_list AS
Select
    vs_gym.member_details.MEMBER_ID,
    vs_gym.plans.PLAN_ID,
    vs_gym.plans.PLAN_NAME,
    vs_gym.member_details.created_at,
    vs_gym.member_details.MEMBER_EXPIRY_DATE,
    vs_gym.member_details.MEMBER_STATUS,
    vs_gym.member_details.MEMBER_ADDRESS,
    vs_gym.member_details.MEMBER_GENDER,
    vs_gym.member_details.MEMBER_DATE_OF_BIRTH,
    vs_gym.member_details.MEMBER_PHONE_NUMBER,
    vs_gym.member_details.PAYMENT_ID,
    vs_gym.member_details.MEMBER_PAYMENT,
    vs_gym.member_details.HEALTH_HEIGHT,
    vs_gym.member_details.HEALTH_WEIGHT,
    vs_gym.member_details.HEALTH_WAIST,
    vs_gym.member_details.HEALTH_REMARKS,
    vs_gym.member_details.GYM_ID,

    vs_gym.users.name
From
    vs_gym.users Inner Join
    vs_gym.member_details On vs_gym.users.MEMBER_ID = vs_gym.member_details.MEMBER_ID Inner Join
    vs_gym.plans On vs_gym.plans.PLAN_ID = vs_gym.member_details.PLAN_ID
                                
                             ");



       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
