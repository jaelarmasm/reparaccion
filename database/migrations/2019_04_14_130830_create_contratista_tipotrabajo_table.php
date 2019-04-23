<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratistaTipotrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratista_tipocontratistas', function (Blueprint $table) {
            $table->bigInteger('contratista_id')->unsigned();
            $table->bigInteger('tipotrabajo_id')->unsigned();
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
        Schema::table('contratista_tipocontratistas', function (Blueprint $table) {
            $table->dropForeign(['contratista_id']);
            $table->dropColumn('contratista_id');
            $table->dropForeign(['tipotrabajo_id']);
            $table->dropColumn('tipotrabajo_id');
        });
        Schema::dropIfExists('contratista_tipocontratistas');
    }
}
