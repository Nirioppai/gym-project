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
    member_details.member_id,
    plans.plan_id,
    plans.plan_name,
    member_details.created_at,
    member_details.member_expiry_date,
    member_details.member_status,
    member_details.member_address,
    member_details.member_gender,
    member_details.member_date_of_birth,
    member_details.member_phone_number,
    member_details.payment_id,
    member_details.member_payment,
    member_details.health_height,
    member_details.health_weight,
    member_details.health_waist,
    member_details.health_remarks,
    member_details.gym_id,

    users.name
From
    users Inner Join
    member_details On users.member_id = member_details.member_id Inner Join
    plans On plans.plan_id = member_details.plan_id
                                
                             ");



       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
