<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAddVouchersTable extends Migration
{
    public function up()
    {
        Schema::table('add_vouchers', function (Blueprint $table) {
            $table->unsignedBigInteger('merchant_id')->nullable();
            $table->foreign('merchant_id', 'merchant_fk_2678380')->references('id')->on('merchant_managements');
        });
    }
}
