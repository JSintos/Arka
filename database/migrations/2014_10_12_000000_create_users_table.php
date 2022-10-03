<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('username')->unique();
            $table->string('emailAddress')->unique();
            $table->string('password');
            $table->tinyInteger('userType')->default(0);
            $table->json('communityList')->nullable()->default(null);
            $table->json('badgeList')->nullable()->default(null);
            $table->dateTime('subscriptionDate')->nullable()->defaul(null);
            $table->boolean('isVerified')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
