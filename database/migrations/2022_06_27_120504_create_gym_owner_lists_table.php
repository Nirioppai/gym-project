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
    staff.member_id,
    staff.name,
    staff.email,
    gym_lists.gym_id,
    gym_lists.gym_name,
    gym_lists.gym_owner,
    gym_lists.gym_location,
    gym_lists.gym_details
From
    staff Inner Join
    gym_lists On staff.member_id = gym_lists.gym_owner
                                
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
