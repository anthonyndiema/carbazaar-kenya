<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addetails', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
            $table->string('fuel_type')->nullable();
            $table->string('interior_type')->nullable();
            $table->string('color')->nullable();
            $table->string('enginesize_cc')->nullable();
            $table->string('descr')->nullable();
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
        Schema::dropIfExists('addetails');
    }
}