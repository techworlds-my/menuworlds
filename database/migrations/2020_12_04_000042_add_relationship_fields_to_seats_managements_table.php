<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSeatsManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('seats_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_2678122')->references('id')->on('order_managements');
        });
    }
}
