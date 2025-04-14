@extends('layouts.app')

@section('content')

</div>
</nav>

<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center mb-5 text-gray-800 dark:text-white">Carrito de Compras</h1>

    @if ($carrito && $carrito->items->count() > 0)
        <div class="bg-white shadow-md rounded-lg overflow-hidden dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3">Producto</th>
                        <th scope="col" class="px-4 py-3">Cantidad</th>
                        <th scope="col" class="px-4 py-3">Precio</th>
                        <th scope="col" class="px-4 py-3">Total</th>
                        <th scope="col" class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrito->items as $item)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $item->libro->titulo }}</td>
                            <td class="px-4 py-3">{{ $item->cantidad }}</td>
                            <td class="px-4 py-3">${{ number_format($item->precio, 2) }}</td>
                            <td class="px-4 py-3">${{ number_format($item->cantidad * $item->precio, 2) }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('carrito.eliminar', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-between items-center mt-5">
            <a href="{{ route('libros.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">Seguir Comprando</a>
            <button class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Finalizar Compra</button>
        </div>
    @else
        <p class="text-center text-gray-500 dark:text-gray-400">Tu carrito está vacío.</p>
        <div class="flex justify-center mt-5">
            <a href="{{ route('libros.index') }}" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Ir al Catálogo</a>
        </div>
    @endif
</div>

<main>
</main>

@endsection