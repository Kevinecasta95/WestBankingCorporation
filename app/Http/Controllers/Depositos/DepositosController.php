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

        $cuentaBancaria = CuentasBancaria::find($data['numero_cuenta']);
        $cuentaBancaria->monto_cuenta += (int)$data['monto_transaccion'];
        $cuentaBancaria->save();
        
        if($cuentaBancaria){
            Transaccion::create($data);
            return redirect('/')->with('flash_message_success', 'Depósito hecho correctamente');
        }else{
            return redirect('/')->with('flash_message_error', 'Error al crear depósito');

        }
    }
}
