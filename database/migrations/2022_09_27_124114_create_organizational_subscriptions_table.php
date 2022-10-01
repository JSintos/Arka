<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationalSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizational_subscriptions', function (Blueprint $table) {
            $table->id('organizationalId');
            $table->string('fullName');
            $table->string('emailAddress');
            $table->string('companyName');
            $table->integer('companySize');
            $table->string('country');
            $table->text('details');
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
        Schema::dropIfExists('organizational_subscriptions');
    }
}
