<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCheques extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheques', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('cheque_cuenta')->unsigned()->nullable();
            $table->foreign('cheque_cuenta')->references('id')->on('cuentas_bancarias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cheque_transaccion')->unsigned()->nullable();
            $table->foreign('cheque_transaccion')->references('id')->on('transacciones')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cheque_monto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cheques');
    }
}
