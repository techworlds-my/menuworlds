<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsLogsTable extends Migration
{
    public function up()
    {
        Schema::create('seats_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('seats')->nullable();
            $table->datetime('time_start')->nullable();
            $table->datetime('time_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
