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
    gym_lists.gym_id,
    gym_lists.gym_name,
    staff.name,
    gym_lists.gym_location,
    gym_lists.gym_image,
    gym_lists.gym_details
From
    gym_lists Inner Join
    staff On gym_lists.gym_owner = staff.member_id
                                
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
