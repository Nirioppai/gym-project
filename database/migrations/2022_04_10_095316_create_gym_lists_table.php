<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_lists', function (Blueprint $table) {
            $table->id();
            $table->string('gym_id');
            $table->string('gym_name');
            $table->string('gym_owner'); // owner ID
            $table->string('gym_location');
            $table->string('gym_image');
            $table->string('gym_details');
            $table->timestamps();
        });
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
