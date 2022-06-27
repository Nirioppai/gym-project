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
        DB::statement("CREATE VIEW view_plans AS
Select
    vs_gym.plans.PLAN_ID,
    vs_gym.plans.PLAN_NAME,
    vs_gym.plans.PLAN_DESCRIPTION,
    vs_gym.plans.PLAN_VALIDITY,
    vs_gym.plans.PLAN_AMOUNT,
    vs_gym.plans.PLAN_STATUS,
    vs_gym.gym_lists.GYM_ID,
    vs_gym.gym_lists.GYM_NAME
From
    vs_gym.plans Inner Join
    vs_gym.gym_lists On vs_gym.gym_lists.GYM_ID = vs_gym.plans.GYM_ID
                                
                             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_lists');
    }
};
