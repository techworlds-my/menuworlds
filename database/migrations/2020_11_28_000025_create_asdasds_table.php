<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsdasdsTable extends Migration
{
    public function up()
    {
        Schema::create('asdasds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adasda')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
