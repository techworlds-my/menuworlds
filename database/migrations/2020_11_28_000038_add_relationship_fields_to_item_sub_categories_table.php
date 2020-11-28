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
        });
    }
}
