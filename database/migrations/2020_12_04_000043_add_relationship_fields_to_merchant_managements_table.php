<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMerchantManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('merchant_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id');
            $table->foreign('sub_category_id', 'sub_category_fk_2671659')->references('id')->on('merchant_sub_categories');
            $table->unsignedBigInteger('merchane_level_id');
            $table->foreign('merchane_level_id', 'merchane_level_fk_2672186')->references('id')->on('merchant_levels');
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id', 'area_fk_2672283')->references('id')->on('areas');
        });
    }
}
