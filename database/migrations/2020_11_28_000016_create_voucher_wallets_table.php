<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherWalletsTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_redeem')->default(0)->nullable();
            $table->string('usage')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
