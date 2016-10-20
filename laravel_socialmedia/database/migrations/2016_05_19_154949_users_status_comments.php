<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersStatusComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_status_comments', function (Blueprint $table) 
        {
        $table->increments('id');
        $table->longText('comment_text');
        $table->integer('user_id');
        $table->integer('status_id');
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
         Schema::drop('users_status_comments');
    }
}
