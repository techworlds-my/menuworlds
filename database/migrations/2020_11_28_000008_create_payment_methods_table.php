<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('method');
            $table->string('status');
            $table->string('description');
            $table->boolean('in_enable')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
