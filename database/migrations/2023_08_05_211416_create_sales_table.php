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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->integer('client_id');
            $table->integer('product_id');
            $table->integer('payment_id');
            $table->integer('branch_id');
            $table->integer('employee_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('commission_pay');
            $table->integer('invoice');
            $table->integer('pending_pay');

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
        Schema::dropIfExists('sales');
    }
};
