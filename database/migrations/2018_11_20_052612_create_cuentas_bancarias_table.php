<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasBancariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero_cuenta')->nullable();
            $table->integer('codigo_usuario')->unsigned()->nullable();
            $table->string('tipo_cuenta');
            $table->integer('monto_cuenta')->nullable();
            $table->foreign('codigo_usuario')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuentas_bancarias');
    }
}
