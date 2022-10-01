<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('reportId');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users');
            $table->text('reportDescription');
            $table->unsignedBigInteger('reportedUserId');
            $table->foreign('reportedUserId')->references('userId')->on('users');
            $table->tinyInteger('status')->default(0);
            $table->boolean('resolutionStatus')->nullable();
            $table->unsignedBigInteger('resolvedBy')->nullable();
            $table->foreign('resolvedBy')->references('userId')->on('users');
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
        Schema::dropIfExists('reports');
    }
}
