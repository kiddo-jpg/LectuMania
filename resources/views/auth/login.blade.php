@extends('layouts.app')

@section('content')

</div>
</nav>


<div class="max-w-md mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center mb-5 text-white">Iniciar Sesión</h1>
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="email" id="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" id="password" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">Iniciar Sesión</button>
    </form>
</div>

<main>
</main>

@endsection