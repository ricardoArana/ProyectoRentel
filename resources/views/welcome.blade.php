
<nav x-data="{ open: false }" class="bg-black border-b border-gray-100 h-28">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-4">
        <div class="flex justify-between h-16">
            <div class="flex">
                <link rel="icon" href="{{ url('img/logo.png') }}">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('productos') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-white" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-xl">
                <x-nav-link class="ml-[365px]" :href="route('register')" :active="request()->routeIs('register')">
                    {{ __('Register') }}
                </x-nav-link>
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    {{ __('Login') }}
                </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-m font-medium text-white hover:text-orange-400 hover:border-orange-300 focus:outline-none focus:text-orange-500 focus:border-orange-300 transition duration-150 ease-in-out">


                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->

                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="sm:bg-white flex" :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 mt-6 h-auto bg-white block border">
            <x-nav-link class="text-black bg-white  w-full px-5 py-5 " :href="route('register')" :active="request()->routeIs('register')">
                {{ __('Register') }}
            </x-nav-link>
            <x-nav-link  class="text-black bg-white  w-full px-5 py-5" :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
            </div>
        </div>
    </div>
</nav>
<div class="bg-black text-white text-5xl text-center pt-5 pb-3">
    Products
</div>


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
                                        <td class="px-6 py-2"><a href="{{route('producto', $producto)}}"> <img class="h-60 w-auto" src="{{ URL($producto->imagenes[0]->imagen) }}" alt="imagen del producto"></a></td>
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

                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>

