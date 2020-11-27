<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddOnManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('add_on_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->decimal('price', 15, 2);
            $table->boolean('is_enable')->default(0)->nullable();
            $table->string('item');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
