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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->dateTime('event_start');
            $table->dateTime('event_end');
            $table->unsignedInteger('available_tickets');
            $table->string('location');
            $table->decimal('price', 20, 2);
            $table->text('description');
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
        Schema::dropIfExists('event');
    }
};
