<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('documento_cuenta')->unsigned()->nullable();
            $table->foreign('documento_cuenta')->references('id')->on('cuentas_bancarias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('documento_transaccion')->unsigned()->nullable();
            $table->foreign('documento_transaccion')->references('id')->on('transacciones')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('documento_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documentos');
    }
}
