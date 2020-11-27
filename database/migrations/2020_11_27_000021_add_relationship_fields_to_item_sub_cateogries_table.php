<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemSubCateogriesTable extends Migration
{
    public function up()
    {
        Schema::table('item_sub_cateogries', function (Blueprint $table) {
            $table->unsignedBigInteger('item_category_id');
            $table->foreign('item_category_id', 'item_category_fk_2671902')->references('id')->on('item_catrgories');
        });
    }
}
