<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyWorkInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_work_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('month');
            $table->date('month_start_date');
            $table->date('month_end_date');
            $table->time('monthly_operating_time')->default(0);
            $table->integer('monthly_salary')->default(0);
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('salary_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('salary_id')->references('id')->on('salaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_work_informations');
    }
}
