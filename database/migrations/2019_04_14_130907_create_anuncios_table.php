<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contratista_id')->unsigned();
            $table->bigInteger('tipotrabajo_id')->unsigned();
            $table->string('titulo');
            $table->string('imagen');
            $table->text('descripcion');
            $table->boolean('aprobado')->default(false);
            $table->integer('clicks')->nullable();
            $table->timestamps();
            $table->foreign('contratista_id')->references('id')->on('contratistas');
            $table->foreign('tipotrabajo_id')->references('id')->on('tipotrabajos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anuncios', function (Blueprint $table) {
            $table->dropForeign(['contratista_id']);
            $table->dropColumn('contratista_id');
            $table->dropForeign(['tipotrabajo_id']);
            $table->dropColumn('tipotrabajo_id');
        });
        Schema::dropIfExists('anuncios');
    }
}
