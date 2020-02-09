<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriterias', function (Blueprint $table) {
            $table->increments('id');$table->string('kriteria')->nullable();
            $table->integer('bobot')->nullable();
            $table->string('atribut');
            $table->softDeletes();
            $table->timestamps();
            $table->integer('created_by')->nullable();

             $table->integer('updated_by')->nullable();

             $table->integer('deleted_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kriterias');
    }
}
