<?php

namespace App\Http\Controllers\Depositos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaccion;
use App\CuentasBancaria;
use Auth;

class DepositosController extends Controller
{
    public function create(){
        $cuentasBancarias = CuentasBancaria::all();
        return view('depositos.create', compact('cuentasBancarias'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'numero_cuenta' => 'required',
            'monto_transaccion' => 'required|min:1',
            'sucursal_transaccion' => 'required'
        ]);
        $data = $request->except('_token');
        $data['codigo_transaccion'] = 7705;
        $data['nombre_transaccion'] = 'Depósito';
        $data['colaborador_transaccion'] = Auth::user()->id;

        $montoTransaccion = (int)$data['monto_transaccion'];

        $cuentaBancaria = CuentasBancaria::find($data['numero_cuenta']);
        $cuentaBancaria->monto_cuenta += $montoTransaccion;
        $cuentaBancaria->save();
        
        if($cuentaBancaria){
            $transaccion = Transaccion::create($data);
            if($montoTransaccion >= 55000){
                $documento = Documento::create([
                    'documento_cuenta' => $cuentaBancaria->id,
                    'documento_transaccion' => $transaccion->id,
                    'documento_tipo' => 2907
                ]);
            }
            return redirect('/')->with('flash_message_success', 'Depósito hecho correctamente');
        }else{
            return redirect('/')->with('flash_message_error', 'Error al crear depósito');

        }
    }
}
