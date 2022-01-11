<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekerSkillSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeker_skill_sets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skill_set_id');
            $table->unsignedBigInteger('seeker_profile_id');

            $table->foreign('seeker_profile_id')->references('id')->on('seeker_profiles');
            $table->foreign('skill_set_id')->references('id')->on('skill_sets');
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
        Schema::dropIfExists('seeker_skill_sets');
    }
}
