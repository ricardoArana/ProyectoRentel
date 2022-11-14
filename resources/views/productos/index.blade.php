<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold leading-tight bg-black">
            {{ __('PRODUCTS') }}
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
                                    <tr class="border-2 border-grey-700">
                                        @php
                                        $vermas = false;
                                            $desCorta = substr($producto->descripcion, 0, 70);
                                            if (strlen($producto->descripcion) > 70) {
                                                $desCorta = $desCorta . '...';
                                                $vermas = true;
                                            }
                                            else {
                                                $vermas = false;
                                            }
                                        @endphp
                                        <td class="px-6 py-2"><a href="{{route('producto', $producto)}}"> <img class="h-60 w-auto" src="{{ URL($producto->imagen) }}" alt="imagen del producto"></a></td>
                                        <td class="px-6 py-2 w-96"><p class="text-3xl mb-4 ">{{ $producto->nombre }}</p>{{ $desCorta }}
                                        @if ($vermas)
                                            <a href="{{route('producto', $producto)}}"> Ver más </a>
                                        @endif
                                    </td>

                                        <td class="px-6 py-2">{{ $producto->precio }} &euro;</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-orange-500 rounded">Add to cart</button>
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

                                <a href="/productos/create" class="my-4 text-orange-700 hover:underline text-xl">Insertar un nuevo producto</a>
                                @endif

                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
