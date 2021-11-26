<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_degree_name');
            $table->string('institute_university_name');
            $table->date('starting_date');
            $table->date('completion_date');
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
        Schema::dropIfExists('education_details');
    }
}
