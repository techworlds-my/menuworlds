<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('item_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2680038')->references('id')->on('merchant_managements');
        });
    }
}
