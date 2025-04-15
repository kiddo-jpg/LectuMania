@extends('layouts.app')



@section('content')

</nav>
</div>

<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex justify-between items-center p-4">
                <h2 class="text-lg font-bold text-gray-800 dark:text-white">Lista de Usuarios</h2>
                <!-- Botón para agregar usuario -->
                <a href="{{ route('usuarios.create') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                    Agregar Usuario
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">ID</th>
                            <th scope="col" class="px-4 py-3">Nombre</th>
                            <th scope="col" class="px-4 py-3">Usuario</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Teléfono</th>
                            <th scope="col" class="px-4 py-3">Rol</th>
                            <th scope="col" class="px-4 py-3">Estado</th>
                            <th scope="col" class="px-4 py-3">Foto</th>
                            <th scope="col" class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-3">{{ $usuario->id }}</td>
                                <td class="px-4 py-3">{{ $usuario->nombre }}</td>
                                <td class="px-4 py-3">{{ $usuario->usuario }}</td>
                                <td class="px-4 py-3">{{ $usuario->email }}</td>
                                <td class="px-4 py-3">{{ $usuario->telefono ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ ucfirst($usuario->rol) }}</td>
                                <td class="px-4 py-3">
                                    @if ($usuario->estado === 1)
                                        <span class="text-green-600 font-medium">Activo</span>
                                    @else
                                        <span class="text-red-600 font-medium">Inactivo</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($usuario->foto)
                                        <img src="{{ asset('storage/' . $usuario->foto) }}" alt="Foto de {{ $usuario->nombre }}" class="w-10 h-10 rounded-full">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex space-x-2">
                                        <!-- Botón para editar -->
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</a>
                                        
                                        <!-- Botón para eliminar -->
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<main>
</main>
@endsection