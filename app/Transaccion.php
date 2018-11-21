<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $table = 'transacciones';
    protected $primaryKey = 'id';
    protected $fillable = [];

    public function cuentaBancaria(){
        return $this->belongsTo('App\CuentasBancaria', 'numero_cuenta', 'id');
    }

    public function colaborador(){
        return $this->belongsTo('App\User', 'colaborador_transaccion', 'id');
    }

}
