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
        DB::statement("CREATE OR REPLACE VIEW view_plans AS
Select
    plans.plan_id,
    plans.plan_name,
    plans.plan_description,
    plans.plan_validity,
    plans.plan_amount,
    plans.plan_status,
    gym_lists.gym_id,
    gym_lists.gym_name
From
    plans Inner Join
    gym_lists On gym_lists.gym_id = plans.gym_id
                                
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
