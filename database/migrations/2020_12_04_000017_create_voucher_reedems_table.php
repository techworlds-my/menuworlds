<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherReedemsTable extends Migration
{
    public function up()
    {
        Schema::create('voucher_reedems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('redeem_date')->nullable();
            $table->float('amount', 15, 2)->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
