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
        DB::statement("CREATE OR REPLACE VIEW view_gyms AS
Select
    gym_lists.GYM_ID,
    gym_lists.GYM_NAME,
    staff.name,
    gym_lists.GYM_LOCATION,
    gym_lists.GYM_IMAGE,
    gym_lists.GYM_DETAILS
From
    gym_lists Inner Join
    staff On gym_lists.GYM_OWNER = staff.MEMBER_ID
                                
                             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("CREATE OR REPLACE VIEW view_gyms");
    }
};
