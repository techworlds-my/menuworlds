<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('item_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('price', 15, 2);
            $table->string('sales_price')->nullable();
            $table->boolean('is_recommended')->default(0)->nullable();
            $table->boolean('is_popular')->default(0)->nullable();
            $table->boolean('is_new')->default(0)->nullable();
            $table->integer('rate')->nullable();
            $table->boolean('is_active')->default(0)->nullable();
            $table->boolean('is_veg')->default(0)->nullable();
            $table->boolean('is_halal')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
