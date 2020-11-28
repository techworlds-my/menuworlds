<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVoucherWalletsTable extends Migration
{
    public function up()
    {
        Schema::table('voucher_wallets', function (Blueprint $table) {
            $table->unsignedBigInteger('username_id')->nullable();
            $table->foreign('username_id', 'username_fk_2678408')->references('id')->on('merchant_managements');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id', 'voucher_fk_2678410')->references('id')->on('add_vouchers');
        });
    }
}
