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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('price');
            $table->integer('offer')->nullable();
            $table->integer('point');
            $table->integer('point_changed');
            $table->enum('show', ['Y', 'N']);
            $table->enum('exchange', ['Y', 'N']);
            $table->integer('branch_id');

            //relaciones
            /* $table->foreignId('branch_id')
                ->nullable(); */

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
        Schema::dropIfExists('products');
    }
};
