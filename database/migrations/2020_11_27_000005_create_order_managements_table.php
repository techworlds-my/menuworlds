<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('order_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order')->unique();
            $table->string('username');
            $table->string('address');
            $table->decimal('price', 15, 2);
            $table->decimal('delivery_charge', 15, 2)->nullable();
            $table->decimal('tax', 15, 2)->nullable();
            $table->decimal('total', 15, 2);
            $table->string('comment')->nullable();
            $table->boolean('voucher_used')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
