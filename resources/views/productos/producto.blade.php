<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold leading-tight bg-black">
            {{ $producto->nombre }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <table class="table-auto">
                            <tbody>

                                    <tr>

                                        <td class="px-6 py-2"><img class="h-96 w-auto" src="{{ URL($producto->imagen) }}" alt="imagen del producto"></td>
                                        <td class="px-6 py-2 w-5/12"><p class="text-2xl">{{ $producto->descripcion }}</p> <p class="text-m mt-10">{{ $producto->precio }} &euro;</p> </td>

                                        <td class="pl-6 py-2"></td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td >
                                    <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="ml-9 mt-10 px-4 py-1 text-sm text-white bg-orange-500 rounded">Add to cart</button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>






