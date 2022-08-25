<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompanyDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_driver', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('empno')->unique();
            $table->string('company_id', 10);
            $table->string('lastname', 25);
            $table->string('firstname', 25);
            $table->string('midname', 25);
            $table->text('address1');
            $table->text('address2');
            $table->unsignedBigInteger('idtype');
            $table->string('email')->unique();
            $table->enum('status', ['Active','Inactive']);
            $table->string('contactnum', 50)->nullable();
            $table->string('taxid', 25)->nullable();
            $table->timestamps();
            $table->foreign('company_id')->references('company_id')->on('company')->onDelete('cascade');
            $table->foreign('idtype')->references('id')->on('driver_id_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_driver');
    }
}