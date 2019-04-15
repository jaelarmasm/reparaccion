<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoContratistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_contratistas', function (Blueprint $table) {
            $table->bigInteger('contratista_id')->unsigned();
            $table->bigInteger('tipo_trabajo_id')->unsigned();
            $table->timestamps();
            $table->foreign('contratista_id')->references('id')->on('contratistas');
            $table->foreign('tipo_trabajo_id')->references('id')->on('tipo_trabajos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tipo_contratistas', function (Blueprint $table) {
            $table->dropForeign(['contratista_id']);
            $table->dropColumn('contratista_id');
            $table->dropForeign(['tipo_trabajo_id']);
            $table->dropColumn('tipo_trabajo_id');
        });
        Schema::dropIfExists('tipo_contratistas');
    }
}
