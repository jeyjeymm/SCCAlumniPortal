<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_objects', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('tagline');
            $table->string('tagline_color');
            $table->string('slogan');
            $table->string('slogan_color');
            $table->string('text_alignment');
            $table->string('image_name');
            $table->string('mime_type');
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
        Schema::drop('slider_objects');
    }
}
