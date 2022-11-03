<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <table class="table-auto">
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td class="px-6 py-2"><img class="h-44 w-full" src="{{ URL($producto->imagen) }}" alt="imagen del producto"></td>
                                        <td class="px-6 py-2">{{ $producto->nombre }}</td>
                                        <td class="px-6 py-2">{{ $producto->descripcion }}</td>
                                        <td class="px-6 py-2">{{ $producto->precio }}</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Añadir al carrito</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="/productos/{{ $producto->id }}/edit"
                                                class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>

                                                <form action="/productos/{{ $producto->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('¿Seguro?')" class="px-4 py-1 text-sm text-white bg-red-400 rounded" type="submit">Borrar</button>
                                                </form>
                                        </td>
                                    </tr>

                                @endforeach
                                <a href="/productos/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo producto</a>

                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
