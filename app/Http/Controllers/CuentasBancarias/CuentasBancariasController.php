<?php

namespace App\Http\Controllers\CuentasBancarias;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CuentasBancaria;
use App\Cliente;
use Illuminate\Http\Request;

class CuentasBancariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cuentasbancarias = CuentasBancaria::where('numero_cuenta', 'LIKE', "%$keyword%")
                ->orWhere('codigo_usuario', 'LIKE', "%$keyword%")
                ->orWhere('tipo_cuenta', 'LIKE', "%$keyword%")
                ->orWhere('monto_cuenta', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cuentasbancarias = CuentasBancaria::latest()->paginate($perPage);
        }

        return view('cuentas-bancarias.index', compact('cuentasbancarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('cuentas-bancarias.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'numero_cuenta' => 'required',
			'codigo_usuario' => 'required',
			'tipo_cuenta' => 'required',
			'monto_cuenta' => 'required'
		]);
        $requestData = $request->all();
        
        CuentasBancaria::create($requestData);

        return redirect('cuentas_bancarias')->with('flash_message', 'CuentasBancaria added!');
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
        $cuentasbancaria = CuentasBancaria::findOrFail($id);

        return view('cuentas-bancarias.show', compact('cuentasbancaria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $clientes = Cliente::all();
        $cuentasbancaria = CuentasBancaria::findOrFail($id);

        return view('cuentas-bancarias.edit', compact('cuentasbancaria', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'numero_cuenta' => 'required',
			'codigo_usuario' => 'required',
			'tipo_cuenta' => 'required',
			'monto_cuenta' => 'required'
		]);
        $requestData = $request->all();
        
        $cuentasbancaria = CuentasBancaria::findOrFail($id);
        $cuentasbancaria->update($requestData);

        return redirect('cuentas_bancarias')->with('flash_message', 'CuentasBancaria updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        CuentasBancaria::destroy($id);

        return redirect('cuentas_bancarias')->with('flash_message', 'CuentasBancaria deleted!');
    }
}
