<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero_cuenta')->unsigned()->nullable();
            $table->foreign('numero_cuenta')->references('id')->on('cuentas_bancarias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('codigo_transaccion');
            $table->string('nombre_transaccion');
            $table->integer('monto_transaccion');
            $table->text('comentarios_transaccion');
            $table->string('sucursal_transaccion');
            $table->integer('colaborador_transaccion')->unsigned();
            $table->foreign('colaborador_transaccion')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transacciones');
    }
}
