<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultiBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('beneficiaries')->nullable();
            $table->string('duration')->nullable();
            $table->string('budget')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->string('outreach')->nullable();
            $table->string('time-period')->nullable();
            $table->bigInteger('social_init_id')->unsigned();
            $table->bigInteger('insta_camp_id')->unsigned();
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
        Schema::dropIfExists('multi_budgets');
    }
}
