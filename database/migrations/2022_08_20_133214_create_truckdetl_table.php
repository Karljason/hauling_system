<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckdetlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truckdetl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Truckkey');
            $table->unsignedBigInteger('Companykey');
            $table->string('PlateNo', 15);
            $table->foreign('Companykey')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('Truckkey')->references('Id')->on('truck_types')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('truckdetl');
    }
}
