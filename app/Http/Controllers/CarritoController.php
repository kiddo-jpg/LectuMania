<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios; // Asegúrate de importar el modelo Usuarios
use App\Models\Libros; // Importar el modelo Libro

class CarritoController extends Controller
{
    public function index()
    {
        // Obtener el carrito de la sesión
        $items = session()->get('carrito', []);

        // Retornar la vista del carrito con los datos
        return view('carrito.index', compact('items'));
    }

    public function agregar(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'libro_id' => 'required|exists:libros,id', // Asegúrate de que el libro exista
            'cantidad' => 'required|integer|min:1',   // La cantidad debe ser al menos 1
        ]);

        // Obtener el carrito actual de la sesión (o inicializarlo si no existe)
        $carrito = session()->get('carrito', []);

        // Verificar si el libro ya está en el carrito
        if (isset($carrito[$request->libro_id])) {
            // Si ya está, incrementar la cantidad
            $carrito[$request->libro_id]['cantidad'] += $request->cantidad;
        } else {
            // Si no está, agregarlo al carrito
            $libro = Libros::find($request->libro_id);
            $carrito[$request->libro_id] = [
                'producto' => $libro->titulo,
                'precio' => $libro->precio,
                'cantidad' => $request->cantidad,
            ];
        }

        // Guardar el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        // Redirigir al carrito con un mensaje de éxito
        return redirect()->route('carrito.index')->with('success', 'Libro agregado al carrito exitosamente.');
    }
}