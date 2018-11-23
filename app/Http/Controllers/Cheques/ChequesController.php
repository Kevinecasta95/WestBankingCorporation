<?php

namespace App\Http\Controllers\Cheques;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transaccion;
use App\CuentasBancaria;
use App\Cheque;
use App\Documento;
use Auth;

class ChequesController extends Controller
{
    public function create(){
        $cuentasBancarias = CuentasBancaria::all();
        return view('cheques.create', compact('cuentasBancarias'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'numero_cuenta' => 'required',
            'monto_transaccion' => 'required|min:1',
            'sucursal_transaccion' => 'required'
        ]);
        $data = $request->except('_token');
        $data['codigo_transaccion'] = 7005;
        $data['colaborador_transaccion'] = Auth::user()->id;

        $montoTransaccion = (int)$data['monto_transaccion'];

        $cuentaBancaria = CuentasBancaria::find($data['numero_cuenta']);

        if($cuentaBancaria->monto_cuenta >= $montoTransaccion){
            $cuentaBancaria->monto_cuenta -= $montoTransaccion;
            $cuentaBancaria->save();

            $data['nombre_transaccion'] = 'Cheque';

            $transaccion = Transaccion::create($data);

            $cheque = Cheque::create([
                'cheque_cuenta' => $cuentaBancaria->id,
                'cheque_transaccion' => $transaccion->id,
                'cheque_monto' => $montoTransaccion
            ]);

            if($montoTransaccion >= 7000){
                $documento = Documento::create([
                    'documento_cuenta' => $cuentaBancaria->id,
                    'documento_transaccion' => $transaccion->id,
                    'documento_tipo' => 2322
                ]);
            }

            return redirect('/')->with('flash_message_success', 'Cheque hecho correctamente');

        }else{
            $data['nombre_transaccion'] = 'Cheque rechazado';

            $transaccion = Transaccion::create($data);

            $cheque = Cheque::create([
                'cheque_cuenta' => $cuentaBancaria->id,
                'cheque_transaccion' => $transaccion->id,
                'cheque_monto' => $montoTransaccion
            ]);

            return redirect()->back()->withErrors(["Cheque rechazado por falta de fondos; Transacción #$transaccion->id"]);

        }
    }
}
