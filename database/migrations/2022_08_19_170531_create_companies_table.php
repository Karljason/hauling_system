<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id('id');
            $table->string('company_id', 6);
            $table->string('CompanyName', 50);
            $table->string('Address');
            $table->string('email', 50);
            $table->string('ContactPerson', 50);
            $table->string('TaxId', 25);
            $table->string('Cellphone', 20);
            $table->string('Telephone', 20);
            $table->string('FaxNumber', 20);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
