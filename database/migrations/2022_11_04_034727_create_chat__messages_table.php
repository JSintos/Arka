<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat__messages', function (Blueprint $table) {
            $table->id('chatMessageId');
            $table->unsignedBigInteger('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->json('messages');
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
        Schema::dropIfExists('chat__messages');
    }
}
