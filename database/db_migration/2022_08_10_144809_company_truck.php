<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyTruck extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_truck', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('code', 6)->unique();
            $table->string('company_id', 12);
            $table->unsignedBigInteger('trucktype');
            $table->string('description', 25);
            $table->string('platenum', 25);
            $table->timestamps();
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('trucktype')->references('id')->on('truck_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
