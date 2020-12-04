<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVoucherItemManagementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('add_voucher_item_management', function (Blueprint $table) {
            $table->unsignedBigInteger('add_voucher_id');
            $table->foreign('add_voucher_id', 'add_voucher_id_fk_2673647')->references('id')->on('add_vouchers')->onDelete('cascade');
            $table->unsignedBigInteger('item_management_id');
            $table->foreign('item_management_id', 'item_management_id_fk_2673647')->references('id')->on('item_managements')->onDelete('cascade');
        });
    }
}
