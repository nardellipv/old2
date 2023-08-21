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

            //relaciones
            $table->foreignId('client_id')
                ->nullable();

            $table->foreignId('product_id')
                ->constrained();

            $table->foreignId('payment_id')
                ->constrained();

            $table->foreignId('branch_id')
                ->constrained();

            /* $table->foreignId('employee_id')
                ->constrained(); */

            $table->integer('employee_id');
            $table->integer('price');
            $table->mediumText('comment')->nullable();
            $table->integer('invoice');

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
