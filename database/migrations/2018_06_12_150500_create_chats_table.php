<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('status');
            $table->integer('friend_ID')->unsigned();
            $table->foreign('friend_ID')->references('id')->on('friends');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
