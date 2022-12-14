<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id('feedbackId');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->dateTime('dateFeedbackAnswered');
            $table->tinyInteger('type');
            $table->integer('firstQuestionRating')->nullable();
            $table->integer('secondQuestionRating')->nullable();
            $table->integer('thirdQuestionRating')->nullable();
            $table->integer('fourthQuestionRating')->nullable();
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
        Schema::dropIfExists('feedbacks');
    }
}
