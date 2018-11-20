<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
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
            $clientes = Cliente::where('codigo_usuario', 'LIKE', "%$keyword%")
                ->orWhere('primer_nombre', 'LIKE', "%$keyword%")
                ->orWhere('segundo_nombre', 'LIKE', "%$keyword%")
                ->orWhere('primer_apellido', 'LIKE', "%$keyword%")
                ->orWhere('segundo_apellido', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $clientes = Cliente::latest()->paginate($perPage);
        }

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('clientes.create');
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
			'primer_nombre' => 'required',
			'segundo_nombre' => 'required',
			'primer_apellido' => 'required',
			'segundo_apellido' => 'required'
		]);
        $requestData = $request->all();
        
        Cliente::create($requestData);

        return redirect('clientes')->with('flash_message', 'Cliente added!');
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
        $cliente = Cliente::findOrFail($id);

        return view('clientes.show', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);

        return view('clientes.edit', compact('cliente'));
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
			'primer_nombre' => 'required',
			'segundo_nombre' => 'required',
			'primer_apellido' => 'required',
			'segundo_apellido' => 'required'
		]);
        $requestData = $request->all();
        
        $cliente = Cliente::findOrFail($id);
        $cliente->update($requestData);

        return redirect('clientes')->with('flash_message', 'Cliente updated!');
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
        Cliente::destroy($id);

        return redirect('clientes')->with('flash_message', 'Cliente deleted!');
    }
}
