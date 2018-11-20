<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentasBancaria extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cuentas_bancarias';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['numero_cuenta', 'codigo_usuario', 'tipo_cuenta', 'monto_cuenta'];

    public function cliente(){
        return $this->belongsTo('App\Cliente', 'codigo_usuario', 'id');
    }
}
