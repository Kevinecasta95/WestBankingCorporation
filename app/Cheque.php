<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    protected $table = 'cheques';
    protected $fillable = ['cheque_cuenta', 'cheque_transaccion', 'cheque_monto'];
    protected $primaryKey = 'id';

    public function cuentaBancaria(){
        return $this->belongsTo('App\CuentasBancaria', 'cheque_cuenta', 'id');
    }

    public function transaccion(){
        return $this->belongsTo('App\Transaccion', 'cheque_transaccion', 'id');
    }
}
