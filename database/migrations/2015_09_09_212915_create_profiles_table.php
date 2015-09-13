<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('image_name');
            $table->string('mime_type');
            $table->string('nickname');
            $table->string('permanent_address');
            $table->string('present_address');
            $table->string('contact_number');
            $table->string('civil_status');
            $table->string('gender');
            $table->string('birthday');
            $table->string('region_of_origin');
            $table->string('province');
            $table->string('location_of_residence');
            $table->text('about_me');
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
        Schema::drop('profiles');
        DB::statement('SET foreign_key_checks = 1');
    }
}
