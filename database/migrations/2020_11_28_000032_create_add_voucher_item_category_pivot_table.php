<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVoucherItemCategoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('add_voucher_item_category', function (Blueprint $table) {
            $table->unsignedBigInteger('add_voucher_id');
            $table->foreign('add_voucher_id', 'add_voucher_id_fk_2678795')->references('id')->on('add_vouchers')->onDelete('cascade');
            $table->unsignedBigInteger('item_category_id');
            $table->foreign('item_category_id', 'item_category_id_fk_2678795')->references('id')->on('item_categories')->onDelete('cascade');
        });
    }
}
