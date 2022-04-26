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
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('trans_id');
            $table->enum('level', ['Ringan', 'Sedang', 'Berat']);
            $table->text('desc');
            $table->float('price')->nullable();
            $table->enum('status', ['Order', 'Pickup', 'On Service', 'Complete', 'Failed']);
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('id_technician');
            $table->float('rating')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('cust_id')->on('customer')->cascadeOnDelete();
            $table->foreign('id_technician')->references('technician_id')->on('technician')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
};
