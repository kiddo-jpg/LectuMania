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
        // Obtener el carrito del usuario autenticado
        $carrito = \App\Models\Carrito::with('items.libro')->where('usuario_id', Auth::id())->first();

        // Retornar la vista del carrito con los datos
        return view('carrito.index', compact('carrito'));
    }

    public function agregar(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'libro_id' => 'required|exists:libros,id', // Asegúrate de que el libro exista
            'cantidad' => 'required|integer|min:1',   // La cantidad debe ser al menos 1
        ]);

        // Obtener el carrito del usuario autenticado o crearlo si no existe
        $carrito = \App\Models\Carrito::firstOrCreate(
            ['usuario_id' => Auth::id()],
            ['created_at' => now(), 'updated_at' => now()]
        );

        // Verificar si el ítem ya está en el carrito
        $item = \App\Models\CarritoItem::where('carrito_id', $carrito->id)
            ->where('libro_id', $request->libro_id)
            ->first();

        if ($item) {
            // Si ya está, incrementar la cantidad
            $item->cantidad += $request->cantidad;
            $item->save();
        } else {
            // Si no está, agregarlo al carrito
            \App\Models\CarritoItem::create([
                'carrito_id' => $carrito->id,
                'libro_id' => $request->libro_id,
                'cantidad' => $request->cantidad,
                'precio' => Libros::find($request->libro_id)->precio,
            ]);
        }

        // Redirigir al carrito con un mensaje de éxito
        return redirect()->route('carrito.index')->with('success', 'Libro agregado al carrito exitosamente.');
    }

    public function eliminar($id)
    {
        // Buscar el ítem en la base de datos
        $item = \App\Models\CarritoItem::findOrFail($id);

        // Eliminar el ítem
        $item->delete();

        // Redirigir al carrito con un mensaje de éxito
        return redirect()->route('carrito.index')->with('success', 'Ítem eliminado del carrito exitosamente.');
    }
}