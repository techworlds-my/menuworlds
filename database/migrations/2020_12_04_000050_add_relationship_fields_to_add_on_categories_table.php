<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddOnCategoriesTable extends Migration
{
    public function up()
    {
        Schema::table('add_on_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2673349')->references('id')->on('merchant_managements');
        });
    }
}
