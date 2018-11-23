<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table = 'documentos';
    protected $fillable = ['documento_cuenta', 'documento_transaccion', 'documento_tipo'];
    protected $primaryKey = 'id';

    public function cuentaBancaria(){
        return $this->belongsTo('App\CuentasBancaria', 'documento_cuenta', 'id');
    }

    public function transaccion(){
        return $this->belongsTo('App\Transaccion', 'documento_transaccion', 'id');
    }
}
