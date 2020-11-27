<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddOnManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('add_on_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id', 'category_fk_2673358')->references('id')->on('add_on_categories');
        });
    }
}
