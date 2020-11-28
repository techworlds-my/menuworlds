<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_2673342')->references('id')->on('order_managements');
            $table->unsignedBigInteger('item_id')->nullable();
            $table->foreign('item_id', 'item_fk_2678791')->references('id')->on('item_managements');
        });
    }
}
