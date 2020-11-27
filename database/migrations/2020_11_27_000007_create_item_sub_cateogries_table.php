<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSubCateogriesTable extends Migration
{
    public function up()
    {
        Schema::create('item_sub_cateogries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('is_enable')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
