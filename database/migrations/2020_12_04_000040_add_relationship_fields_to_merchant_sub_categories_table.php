<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMerchantSubCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('merchant_sub_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_2671568')->references('id')->on('merchant_categories');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id', 'parent_fk_2719065')->references('id')->on('merchant_sub_categories');
        });
    }
}
