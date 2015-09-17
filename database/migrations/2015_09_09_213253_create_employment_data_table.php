<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('employment_data', function(Blueprint $table){

            $table->increments('id');
            $table->string('employment_status');
            $table->string('present_occupation');
            $table->string('name_of_company_or_org');
            $table->string('place_of_work');
            $table->string('work_address');
            $table->string('is_first_job');
            $table->string('reasons_for_changing_job');
            $table->string('reasons_for_changing_job_others');
            $table->string('job_duration');
            $table->string('method_of_finding_job');
            $table->string('method_of_finding_job_others');
            $table->string('job_finding_duration');
            $table->string('job_finding_duration_others');
            $table->string('salary');
            $table->string('is_curriculum_relevant');
            $table->string('reasons_not_yet_employed');
            $table->string('reasons_not_yet_employed_others');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement('SET foreign_key_checks = 0');
        Schema::drop('employment_data');
        DB::statement('SET foreign_key_checks = 1');

    }
}
