<?php

namespace App\Http\Controllers\Retiros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaccion;
use App\CuentasBancaria;
use Auth;

class RetirosController extends Controller
{
    public function create(){
        $cuentasBancarias = CuentasBancaria::all();
        return view('retiros.create', compact('cuentasBancarias'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'numero_cuenta' => 'required',
            'monto_transaccion' => 'required|min:1',
            'sucursal_transaccion' => 'required'
        ]);
        $data = $request->except('_token');
        $data['codigo_transaccion'] = 7505;
        $data['nombre_transaccion'] = 'Retiro';
        $data['colaborador_transaccion'] = Auth::user()->id;

        $montoTransaccion = (int)$data['monto_transaccion'];

        $cuentaBancaria = CuentasBancaria::find($data['numero_cuenta']);

        if($cuentaBancaria->monto_cuenta >= $montoTransaccion){
            $cuentaBancaria->monto_cuenta -= $montoTransaccion;
            $cuentaBancaria->save();

            if($cuentaBancaria){
                Transaccion::create($data);
                return redirect('/')->with('flash_message_success', 'Retiro hecho correctamente');
            }else{
                return redirect('/')->with('flash_message_error', 'Error al crear retiro');
            }

        }else{
            return redirect()->back()->withErrors(['Saldo insuficiente para hacer retiro']);
        }
        
    }
}
