<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstaCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('service_name')->nullable();
            $table->string('service_url')->nullable();
            $table->text('initiative_description')->nullable();
            $table->string('beneficiaries')->nullable();
            $table->string('duration')->nullable();
            $table->string('budget')->nullable();
            $table->string('region')->nullable();
            $table->string('street')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('feature_image')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insta_campaigns');
    }
}
