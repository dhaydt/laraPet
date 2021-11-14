<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('breed')->nullable();
            $table->string('sex')->nullable();
            $table->string('age')->nullable();
            $table->string('color')->nullable();
            $table->string('face')->nullable();
            $table->string('side')->nullable();
            $table->string('top')->nullable();
            $table->string('behind')->nullable();
            $table->string('barcode')->nullable();
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
        Schema::dropIfExists('pets');
    }
}