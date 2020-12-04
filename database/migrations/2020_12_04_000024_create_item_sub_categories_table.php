<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('item_sub_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('is_enable')->default(0)->nullable();
            $table->string('parent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
