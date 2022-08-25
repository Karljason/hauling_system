<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Company extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('company_id')->unique();
            $table->string('company_name', 50);
            $table->text('address1');
            $table->text('address2');
            $table->string('email', 50)->unique();
            $table->enum('status', ['Active','Inactive']);
            $table->string('contactperson', 50)->nullable();
            $table->string('taxid', 25)->nullable();
            $table->string('cellphone', 20)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('faxnumber', 20)->nullable();
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
        Schema::dropIfExists('company');
    }
}
