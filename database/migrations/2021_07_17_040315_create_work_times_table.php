<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_times', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_time');
            $table->datetime('modify_start_time')->nullable(false)->change();
            $table->datetime('end_time');
            $table->datetime('modify_end_time')->nullable(false)->change();
            $table->time('work_time')->default(0);
            $table->integer('work_number')->default(0);
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_times');
    }
}
