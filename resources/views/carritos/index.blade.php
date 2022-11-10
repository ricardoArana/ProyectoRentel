<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight">
            {{ __('CART') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <table class="table-auto">
                            <thead>
                                @if ($carritos->isEmpty())
                                <p>You have not added anything to the cart yet</p>
                            @else
                                <th class="px-6 py-2 text-gray-500">

                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Product
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Amount
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Price
                                </th>
                                <th class="px-6 py-2 text-gray-500">

                                </th>
                                <th class="px-6 py-2 text-gray-500">

                                    <form action="{{route('vaciar')}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="bg-red-400 text-black px-7 py-2 rounded-xl" type="submit"> Empty cart</button>
                                    </form>
                                </th>
                                @endif
                            </thead>
                            <tbody>


                                @foreach ($carritos as $carrito)
                                    <tr>
                                        <td class="px-6 py-2"><img class="h-60 w-auto" src="{{ URL($carrito->producto->imagen) }}" alt="imagen del producto"></td>
                                        <td class="px-6 py-2">{{ $carrito->producto->nombre }}</td>
                                        <td class="px-6 py-2">{{ $carrito->cantidad }}</td>
                                        <td class="px-6 py-2">{{ $carrito->producto->precio * $carrito->cantidad}}&euro;</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('restar', $carrito) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">-</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('sumar', $carrito) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">+</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if ($carritos->isEmpty())
                            @else
                            <div class="mt-5">

                            </div>
                            <div class="mt-5">
                                @if (Auth::user()->direccion == null)
                                <form action="{{route('indexDireccion')}}" method="get">
                                    @csrf
                                    @method('GET')

                                    <button class="bg-orange-600 text-white px-8 py-3 text-xl rounded-xl" type="submit"> Set your address</button>
                                </form>
                                @else
                                <form action="{{route('pedido')}}" method="post">
                                    @csrf
                                    @method('POST')

                                    <button class="bg-orange-600 text-white px-8 py-3 text-xl rounded-xl" type="submit"> Proceed to buy</button>
                                </form>
                            </div>
<div class="w-full ml-52 text-xl mt-20">
    <p><b> Your address is: </b></p>
                                                            <p>
                                                                Street: {{Auth::user()->direccion->calle}} <br>
                                                                City: {{Auth::user()->direccion->ciudad}} <br>
                                                                Postal code:{{Auth::user()->direccion->codigo_postal}} <br>
                                                                Country: {{Auth::user()->direccion->pais}}
                                                            </p>
                                                            <form action="{{route('editDireccion', Auth::user()->direccion)}}" method="get">
                                                                @csrf
                                                                @method('GET')
                                                            <button type="submit" class="bg-orange-600 text-white px-6 py-2 mt-5 text-xl rounded-xl">Set address</button>
                                                            </form>
                                                        </div>
                                                            @endif
                            @endif
                        </x-plantilla>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
