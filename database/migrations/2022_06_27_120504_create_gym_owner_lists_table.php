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
        DB::statement("CREATE OR REPLACE VIEW view_gym_owners AS
Select
    staff.MEMBER_ID,
    staff.name,
    staff.email,
    gym_lists.GYM_ID,
    gym_lists.GYM_NAME,
    gym_lists.GYM_OWNER,
    gym_lists.GYM_LOCATION,
    gym_lists.GYM_DETAILS
From
    staff Inner Join
    gym_lists On staff.MEMBER_ID = gym_lists.GYM_OWNER
                                
                             ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("CREATE OR REPLACE VIEW view_gym_owners");
    }
};
