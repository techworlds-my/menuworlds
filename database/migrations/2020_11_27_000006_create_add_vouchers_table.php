<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddVouchersTable extends Migration
{
    public function up()
    {
        Schema::create('add_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('voucher_code');
            $table->string('discount_type')->nullable();
            $table->decimal('value', 15, 2);
            $table->longText('description')->nullable();
            $table->float('redeem_point', 15, 2)->nullable();
            $table->boolean('is_free_shipping')->default(0)->nullable();
            $table->boolean('is_credit_purchase')->default(0)->nullable();
            $table->datetime('expired_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
