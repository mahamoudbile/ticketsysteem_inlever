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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cumstomer_id')->references('id')->on('customers');
            $table->foreignId('event_id')->references('id')->on('event');
            $table->integer('order_number')->unique('id')->startingValue('10000')->nullable();
            $table->dateTime('order_date');
            $table->enum('status', ['paid', 'open', 'cancel', 'declined']);
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
        Schema::dropIfExists('order');
    }
};
