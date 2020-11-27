<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToItemManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('item_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_cateogry_id')->nullable();
            $table->foreign('sub_cateogry_id', 'sub_cateogry_fk_2671967')->references('id')->on('item_sub_cateogries');
            $table->unsignedBigInteger('categpry_id')->nullable();
            $table->foreign('categpry_id', 'categpry_fk_2673461')->references('id')->on('item_catrgories');
        });
    }
}
