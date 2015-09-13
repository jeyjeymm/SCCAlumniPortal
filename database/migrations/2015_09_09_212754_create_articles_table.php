<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('body');
            $table->string('image_name');
            $table->string('mime_type');
            $table->integer('department_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('published_at');
            $table->string('status');
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->foreign('department_id')
                    ->references('id')
                    ->on('departments')
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

        DB::statement("SET foreign_key_checks = 0");
        Schema::drop('articles');
        DB::statement("SET foreign_key_checks = 1");

    }
}
