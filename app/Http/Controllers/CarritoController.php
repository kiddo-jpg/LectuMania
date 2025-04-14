<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function index()
    {
        // Aquí puedes pasar los datos del carrito si los tienes
        $items = []; // Ejemplo: datos del carrito
        return view('carrito.index', compact('items'));
    }
}