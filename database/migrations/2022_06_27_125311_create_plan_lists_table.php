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
    plans.PLAN_ID,
    plans.PLAN_NAME,
    plans.PLAN_DESCRIPTION,
    plans.PLAN_VALIDITY,
    plans.PLAN_AMOUNT,
    plans.PLAN_STATUS,
    gym_lists.GYM_ID,
    gym_lists.GYM_NAME
From
    plans Inner Join
    gym_lists On gym_lists.GYM_ID = plans.GYM_ID
                                
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
