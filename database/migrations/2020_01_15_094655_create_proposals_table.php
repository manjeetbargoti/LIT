<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax_number')->nullable();
            $table->text('company_background')->nullable();
            $table->text('project_description')->nullable();
            $table->text('project_goals')->nullable();
            $table->string('submission_time')->nullable();
            $table->string('project_timeline')->nullable();
            $table->text('proposal_elements')->nullable();
            $table->string('evolution_criteria')->nullable();
            $table->text('possible_challanges')->nullable();
            $table->string('budget')->nullable();
            $table->string('social_impact_points')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('business_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('proposals');
    }
}
