<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_bill', function (Blueprint $table) {
            $table->id();
            $table->string('Bill_num');
            $table->string('Name');
            $table->date('Time_Date');
            $table->integer('Numbers_bought');
            $table->integer('Total');
            $table->integer('Discount');
            $table->integer('Total_after_discount');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_bill');
    }
};
