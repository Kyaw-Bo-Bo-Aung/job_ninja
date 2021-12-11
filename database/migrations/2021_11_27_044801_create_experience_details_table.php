<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_details', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('company_name');
            $table->string('job_location');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description');
            $table->unsignedBigInteger('seeker_profile_id');

            $table->foreign('seeker_profile_id')->references('id')->on('seeker_profiles');
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
        Schema::dropIfExists('experience_details');
    }
}
