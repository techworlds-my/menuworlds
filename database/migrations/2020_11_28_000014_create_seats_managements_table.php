<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeatsManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('seats_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('used')->default(0)->nullable();
            $table->datetime('time_start')->nullable();
            $table->datetime('time_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
