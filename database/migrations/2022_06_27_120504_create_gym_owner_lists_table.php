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
        DB::statement("CREATE VIEW view_gym_owners AS
Select
    vs_gym.staff.MEMBER_ID,
    vs_gym.staff.name,
    vs_gym.staff.email,
    vs_gym.gym_lists.GYM_ID,
    vs_gym.gym_lists.GYM_NAME,
    vs_gym.gym_lists.GYM_OWNER,
    vs_gym.gym_lists.GYM_LOCATION,
    vs_gym.gym_lists.GYM_DETAILS
From
    vs_gym.staff Inner Join
    vs_gym.gym_lists On vs_gym.staff.MEMBER_ID = vs_gym.gym_lists.GYM_OWNER
                                
                             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_owner_lists');
    }
};
