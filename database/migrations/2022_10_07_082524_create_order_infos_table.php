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
        Schema::create('order_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->nullable()->constrained();
            $table->string('firstName', 255);
            $table->string('lastName', 255);
            $table->string('address', 255);
            $table->string('address2', 255)->nullable();
            $table->string('state', 255);
            $table->string('town', 255);
            $table->integer('postcode');
            $table->string('phoneNumber', 255);
            $table->boolean('rememberAddress')->nullable();
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
        Schema::dropIfExists('order_infos');
    }
};
