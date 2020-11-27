<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('merchant_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('ssm')->nullable();
            $table->string('address');
            $table->string('postcode')->nullable();
            $table->string('in_charge_person');
            $table->string('contact');
            $table->string('email');
            $table->string('position')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('merchant')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('status')->nullable();
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
