<?php

namespace App\Http\Controllers\Transacciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Transaccion;



class TransaccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $transacciones = Transaccion::where('numero_cuenta', 'LIKE', "%$keyword%")
                ->orWhere('codigo_transaccion', 'LIKE', "%$keyword%")
                ->orWhere('nombre_transaccion', 'LIKE', "%$keyword%")
                ->orWhere('monto_transaccion', 'LIKE', "%$keyword%")
                ->orWhere('comentarios_transaccion', 'LIKE', "%$keyword%")
                ->orWhere('sucursal_transaccion', 'LIKE', "%$keyword%")
                ->orWhere('colaborador_transaccion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $transacciones = Transaccion::latest()->paginate($perPage);
        }

        return view('transacciones.index', compact('transacciones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $transaccion = Transaccion::findOrFail($id);

        return view('transacciones.show', compact('transaccion'));
    }
}
