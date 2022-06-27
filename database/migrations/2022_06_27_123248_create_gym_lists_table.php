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
        DB::statement("CREATE VIEW view_gyms AS
Select
    vs_gym.gym_lists.GYM_ID,
    vs_gym.gym_lists.GYM_NAME,
    vs_gym.staff.name,
    vs_gym.gym_lists.GYM_LOCATION,
    vs_gym.gym_lists.GYM_IMAGE,
    vs_gym.gym_lists.GYM_DETAILS
From
    vs_gym.gym_lists Inner Join
    vs_gym.staff On vs_gym.gym_lists.GYM_OWNER = vs_gym.staff.MEMBER_ID
                                
                             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_lists');
    }
};
