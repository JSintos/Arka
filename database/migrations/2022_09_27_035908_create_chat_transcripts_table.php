<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_transcripts', function (Blueprint $table) {
            $table->id('transciptId');
            $table->unsignedBigInteger('communityId');
            $table->foreign('communityId')->references('communityId')->on('communities');
            $table->text('filePath');
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
        Schema::dropIfExists('chat_transcripts');
    }
}
