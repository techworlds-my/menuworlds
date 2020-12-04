<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('item_sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_2678794')->references('id')->on('item_categories');
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2680015')->references('id')->on('merchant_managements');
<<<<<<< HEAD
=======
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'parent_fk_2719128')->references('id')->on('item_sub_categories');
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f
        });
    }
}
