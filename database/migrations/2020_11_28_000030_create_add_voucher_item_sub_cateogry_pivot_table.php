<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVoucherItemSubCateogryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('add_voucher_item_sub_cateogry', function (Blueprint $table) {
            $table->unsignedBigInteger('add_voucher_id');
            $table->foreign('add_voucher_id', 'add_voucher_id_fk_2673905')->references('id')->on('add_vouchers')->onDelete('cascade');
            $table->unsignedBigInteger('item_sub_cateogry_id');
            $table->foreign('item_sub_cateogry_id', 'item_sub_cateogry_id_fk_2673905')->references('id')->on('item_sub_cateogries')->onDelete('cascade');
        });
    }
}
