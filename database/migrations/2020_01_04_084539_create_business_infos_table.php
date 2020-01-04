<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('business_name')->nullable();
            $table->string('business_description')->nullable();
            $table->string('priority_sdg')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('trade_license_number')->nullable();
            $table->string('trade_license_image')->nullable();
            $table->string('license_expiry_date')->nullable();
            $table->string('alternate_contact_name_1')->nullable();
            $table->string('alternate_contact_job_1')->nullable();
            $table->string('alternate_contact_email_1')->nullable();
            $table->string('alternate_contact_company_1')->nullable();
            $table->string('alternate_contact_name_2')->nullable();
            $table->string('alternate_contact_job_2')->nullable();
            $table->string('alternate_contact_email_2')->nullable();
            $table->string('alternate_contact_company_2')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
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
        Schema::dropIfExists('business_infos');
    }
}
