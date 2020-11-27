<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('merchant_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level');
            $table->boolean('in_enable')->default(0)->nullable();
            $table->string('description')->nullable();
            $table->string('module')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
