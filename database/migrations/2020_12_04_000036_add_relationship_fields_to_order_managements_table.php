<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('order_managements', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2673005')->references('id')->on('merchant_managements');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->foreign('payment_method_id', 'payment_method_fk_2673315')->references('id')->on('payment_methods');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2673316')->references('id')->on('order_statuses');
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->foreign('voucher_id', 'voucher_fk_2673417')->references('id')->on('add_vouchers');
            $table->unsignedBigInteger('order_type_id')->nullable();
            $table->foreign('order_type_id', 'order_type_fk_2677860')->references('id')->on('order_types');
        });
    }
}
