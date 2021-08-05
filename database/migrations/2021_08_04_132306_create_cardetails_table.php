<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardetails', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->string('duty')->nullable();
            $table->double('mileage')->nullable();

            $table->string('make_model')->nullable();

            $table->double('price')->nullable();
            $table->string('negotiable')->nullable();

            $table->string('body_type')->nullable();
            $table->string('transmission')->nullable();

            $table->string('condition_type')->nullable();
            $table->integer('make_year')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardetails');
    }
}