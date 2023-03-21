<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->integer('uid')->unsigned()->default(0);
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('state')->default(0);
            $table->time('attendance_time')->default(date("H:i:s"));;
            $table->date('attendance_date')->default(date("Y-m-d"));;
            $table->boolean('status')->default(1);
            $table->boolean('type')->unsigned()->default(0);
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
        Schema::dropIfExists('attendances');
    }
}
