<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Asegúrate de importar el modelo Usuarios
use App\Models\Libros; // Asegúrate de importar el modelo Libros
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Importar la clase Log para registrar eventos


class UsuariosController extends Controller
{
    public function index()
    {
        return view('usuarios.index'); // Retorna una vista con el formulario para ingresar usuarios
    }

    public function tabla()
    {
        $usuarios = Usuarios::all(); // Obtener todos los usuarios de la base de datos
        return view('usuarios.tablausuarios', compact('usuarios')); // Pasar los usuarios a la vista
    }


    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre'   => 'required|min:2',
            'usuario'  => 'required|min:2',
            'email'    => 'required|email|unique:usuarios,email',
            'telefono' => 'required|numeric',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar la imagen
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=\[\]{};\'":\\|,.<>\/?]).+$/'
            ],
        ]);

        // Crear el usuario y encriptar la contraseña
        $usuario = Usuarios::create([
            'nombre'   => $request->nombre,
            'usuario'  => $request->usuario,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'foto'     => $request->file('foto') ? $request->file('foto')->store('fotos', 'public') : null, // Guardar la ruta de la foto
            'password' => Hash::make($request->password), // Encriptar la contraseña
        ]);

        // Redirige al formulario de login con un mensaje de éxito
        return redirect()->route('login')->with('success', 'Usuario registrado exitosamente. Por favor, inicia sesión.');
    }
}
