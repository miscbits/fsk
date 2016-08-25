<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('artist');
            $table->timestamps();
        });

        Schema::create('song_user', function(Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('song_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('song_id')->references('id')->on('songs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['user_id', 'song_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('songs');
        Schema::drop('song_user');
    }
}
