<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->nullable();
            $table->boolean('is_enable')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
