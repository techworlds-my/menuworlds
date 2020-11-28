<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVoucherItemCatrgoryPivotTable extends Migration
{
    public function up()
    {
        Schema::create('add_voucher_item_catrgory', function (Blueprint $table) {
            $table->unsignedBigInteger('add_voucher_id');
            $table->foreign('add_voucher_id', 'add_voucher_id_fk_2673904')->references('id')->on('add_vouchers')->onDelete('cascade');
            $table->unsignedBigInteger('item_catrgory_id');
            $table->foreign('item_catrgory_id', 'item_catrgory_id_fk_2673904')->references('id')->on('item_catrgories')->onDelete('cascade');
        });
    }
}
