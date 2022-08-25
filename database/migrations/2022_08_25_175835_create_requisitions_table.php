<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id('id');
            $table->string('ctrl_no', 50)->default('2022-00001');
            $table->integer('truck_id')->unsigned();
            $table->enum('status', ['is_pending','is_cancelled','is_completed'])->default('is_pending');
            $table->decimal('total_cost', 10, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->unique('ctrl_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('requisitions');
    }
}
