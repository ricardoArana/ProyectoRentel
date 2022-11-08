<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold leading-tight bg-black">
            {{ __('ORDERS') }}
        </h1>
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
                                        <td class="px-6 py-2"><img class="h-60 w-full" src="{{ URL($producto->imagen) }}" alt="imagen del producto"></td>
                                        <td class="px-6 py-2"><p class="text-xl mb-4">{{ $producto->nombre }}</p>{{ $producto->descripcion }}</td>

                                        <td class="px-6 py-2">{{ $producto->precio }} &euro;</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-orange-500 rounded">Añadir al carrito</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            @if (Auth::user()->rol == "admin")

                                            <a href="/productos/{{ $producto->id }}/edit"
                                                class="px-4 py-1 text-sm text-white bg-blue-600 rounded">Editar</a>

                                                <form action="/productos/{{ $producto->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('¿Seguro?')" class="px-4 py-1 mt-5 text-sm text-white bg-red-600 rounded" type="submit">Borrar</button>
                                                </form>
                                                @endif
                                        </td>
                                    </tr>

                                @endforeach
                                @if (Auth::user()->rol == "admin")

                                <a href="/productos/create" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo producto</a>
                                @endif

                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
