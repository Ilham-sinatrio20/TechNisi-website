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
        Schema::create('message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thread')->default('0');
            $table->text('message');
            $table->enum('is_seen', ['0', '1'])->default('0');
            $table->string('dir', 225)->nullable();
            $table->string('file', 100)->nullable();
            $table->unsignedBigInteger('sender');
            $table->unsignedBigInteger('receiver');
            $table->string('file_name', 225)->nullable();
            $table->timestamps();

            $table->foreign('sender')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('receiver')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message');
    }
};
