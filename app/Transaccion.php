<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'id';
    protected $fillable = [
        'numero_cuenta', 
        'codigo_transaccion', 
        'nombre_transaccion', 
        'monto_transaccion', 
        'comentarios_transaccio', 
        'sucursal_transaccion', 
        'colaborador_transaccion'
    ];

    public function cuentaBancaria(){
        return $this->belongsTo('App\CuentasBancaria', 'numero_cuenta', 'id');
    }

    public function colaborador(){
        return $this->belongsTo('App\User', 'colaborador_transaccion', 'id');
    }

}
