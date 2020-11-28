<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->string('add_on')->nullable();
            $table->decimal('add_on_price', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
