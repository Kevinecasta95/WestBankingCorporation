<?php

namespace App\Http\Controllers\Depositos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Transacciones;
use App\CuentasBancaria;

class DepositosController extends Controller
{
    public function create(){
        $cuentasBancarias = CuentasBancarias::all();
        return view('depositos.create', compact('cuentasBancarias'));
    }
}
