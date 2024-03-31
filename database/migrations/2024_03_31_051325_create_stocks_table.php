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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('Item_name')->nullable();
            $table->integer('Price');
            $table->string('RAM_HDD');
            $table->integer('In_stock');
            $table->string('Company_name');
            $table->string('Design');
            $table->string('Display');
            $table->string('Connectivity');
            $table->string('Img_phone');
            $table->integer('stat')->default(0);
            $table->integer('emailed')->default(0);
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
        Schema::dropIfExists('stocks');
    }
};
