<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('contratista_id')->unsigned();
            $table->bigInteger('estado_id')->unsigned();
            $table->text('descripcion');
            $table->string('foto');
            $table->string('ubicacion');
            $table->float('costo');
            $table->float('calificacion');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('contratista_id')->references('id')->on('contratistas');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contratos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['contratista_id']);
            $table->dropColumn('contratista_id');
            $table->dropForeign(['estado_id']);
            $table->dropColumn('estado_id');
        });
        Schema::dropIfExists('contratos');
    }
}
