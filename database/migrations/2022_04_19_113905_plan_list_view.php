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
        DB::statement("CREATE OR REPLACE VIEW view_plan_list AS
Select
    member_details.MEMBER_ID,
    plans.PLAN_ID,
    plans.PLAN_NAME,
    member_details.created_at,
    member_details.MEMBER_EXPIRY_DATE,
    member_details.MEMBER_STATUS,
    member_details.MEMBER_ADDRESS,
    member_details.MEMBER_GENDER,
    member_details.MEMBER_DATE_OF_BIRTH,
    member_details.MEMBER_PHONE_NUMBER,
    member_details.PAYMENT_ID,
    member_details.MEMBER_PAYMENT,
    member_details.HEALTH_HEIGHT,
    member_details.HEALTH_WEIGHT,
    member_details.HEALTH_WAIST,
    member_details.HEALTH_REMARKS,
    member_details.GYM_ID,

    users.name
From
    users Inner Join
    member_details On users.MEMBER_ID = member_details.MEMBER_ID Inner Join
    plans On plans.PLAN_ID = member_details.PLAN_ID
                                
                             ");



       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("CREATE OR REPLACE VIEW view_plan_list");
    }
};
