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
            $table->string('GYM_ID');
            $table->string('GYM_NAME');
            $table->string('GYM_OWNER'); // owner ID
            $table->string('GYM_LOCATION');
            $table->string('GYM_IMAGE');
            $table->string('GYM_DETAILS');
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
