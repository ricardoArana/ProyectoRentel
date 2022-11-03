<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Linea;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    public function index(){
        $facturas = Factura::all();
        return view('todosLosPedidos.index', [
            'facturas' => $facturas
        ]);

    }

    public function completados(){
        $facturas = Factura::all();
        return view('completados', [
            'facturas' => $facturas
        ]);

    }
}
