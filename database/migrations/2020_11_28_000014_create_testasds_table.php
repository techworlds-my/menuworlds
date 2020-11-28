<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestasdsTable extends Migration
{
    public function up()
    {
        Schema::create('testasds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asd')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
