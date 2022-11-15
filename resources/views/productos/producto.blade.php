<head>
    <!-- JIT SUPPORT, for using peer-* below -->
    <script src="https://unpkg.com/tailwindcss-jit-cdn"></script>
</head>
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
                        <div class="">
                        <div class="flex">
                            <img id="imgGrande" class="h-96 border" src="{{URL($imagenes->get()[0]->imagen)}}" alt="">
                            <img id="" onclick="cambiarImagen()" class="h-10 mt-44 ml-3 " src="{{URL('img/flecha.png')}}" alt="">
                            <div class="mt-28 ml-20 ">
                                                                    <p class="text-2xl">{{ $producto->descripcion }}</p>
                                                                    <p class="text-m mt-10">{{ $producto->precio }} &euro;</p>

                                                                    <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit"
                                                                            class=" mt-10 px-6 py-3 text-xl text-white bg-orange-500 rounded">Add
                                                                            to cart</button>
                                                                    </form>



                                                                </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3 w-80">
                            @foreach ($imagenes->get() as $imagen)
                                <div>
                                <img class="imgPeque" id="{{$imagen->imagen}}" style="height: 5rem; margin-top: 0.5rem; border:1px solid rgb(196, 193, 193);" src="{{URL($imagen->imagen)}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        @if ($producto->video != null)
                            <iframe class="mt-20" width="560" height="315" src="{{$producto->video}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                        @endif
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
    <script>
        imgGrande = document.getElementById("imgGrande");
        imgPeque = document.getElementsByClassName("imgPeque");
        cont = 1;
        function cambiarImagen(){

            if (cont > imgPeque.length -1) {
                cont = 0;
                imgGrande.src = imgPeque[cont].src
            }
            else{
                if (cont == 0) {
                imgGrande.src = imgPeque[cont+1].src
                    ++cont
                }
                else{
                imgGrande.src = imgPeque[cont].src
            }
            ++cont
        }
    }


    </script>
</x-app-layout>
