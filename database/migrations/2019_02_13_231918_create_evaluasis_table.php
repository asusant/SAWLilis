<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvaluasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluasis', function (Blueprint $table) {
            $table->increments('id');$table->string('alternatif_id');
            $table->string('kriteria_id');
            $table->integer('nilai')->nullable();
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
        Schema::drop('evaluasis');
    }
}
