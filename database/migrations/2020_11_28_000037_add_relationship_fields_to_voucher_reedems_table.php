<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToVoucherReedemsTable extends Migration
{
    public function up()
    {
        Schema::table('voucher_reedems', function (Blueprint $table) {
            $table->unsignedBigInteger('voucher_code_id')->nullable();
            $table->foreign('voucher_code_id', 'voucher_code_fk_2678397')->references('id')->on('add_vouchers');
            $table->unsignedBigInteger('username_id')->nullable();
            $table->foreign('username_id', 'username_fk_2678398')->references('id')->on('users');
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2678399')->references('id')->on('merchant_managements');
        });
    }
}
