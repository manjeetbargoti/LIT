<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialInitiativeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_initiative_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image_name')->nullable();
            $table->string('image_size')->nullable();
            $table->bigInteger('social_initiative_id')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('social_initiative_id')->references('id')->on('social_initiatives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_initiative_images');
    }
}
