<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaccion;
use App\Charts\Top5Agencias;
use App\Charts\Top5Operarios;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top5Agencias = $this->chartTop5Agencias();
        $chartTop5Operarios = $this->chartTop5Operarios();
        return view('home', compact('top5Agencias', 'chartTop5Operarios'));
    }

    protected function chartTop5Agencias(){
        $transacciones = Transaccion::where('nombre_transaccion', 'Depósito')->get();
        $data = $transacciones->groupBy('sucursal_transaccion')->map(function ($item, $key) {
            return $item->count();
        })->sort()->reverse()->take(5);
        $chart = new Top5Agencias;
        $chart->labels($data->keys());
        $chart->dataset('Top 5 Agencias', 'column', $data->values());

        return $chart;
    }

    protected function chartTop5Operarios(){
        $transacciones = Transaccion::where('nombre_transaccion', 'Depósito')->get();
        $data = $transacciones->groupBy('colaborador_transaccion')->mapToGroups(function ($item, $key) {
                $colaborador = User::find($key);
                return ["$colaborador->name" => $item];
        });
        $data = $data->map(function ($item, $key) {
            return $item->count();
        })->sort()->reverse()->take(5);
        $chart = new Top5Operarios;
        $chart->labels($data->keys());
        $chart->dataset('Top 5 operarios', 'column', $data->values());

        return $chart;
    }
}
