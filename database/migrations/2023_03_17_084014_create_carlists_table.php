<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarlistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carlists', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('number_plate');
            $table->string('phone');
            $table->integer('charge_id');
            $table->integer('washer_id');
            $table->integer('amount');
            $table->integer('payment_method');
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
        Schema::dropIfExists('carlists');
    }
}
