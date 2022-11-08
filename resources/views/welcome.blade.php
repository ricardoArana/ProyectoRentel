<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>KindaCode.com</title>
</head>

<body class="bg-black">
    <div class="h-40 text-center pt-10 text-3xl text-white">
        <div><a class="mr-5 hover:border-b-2 border-orange-500" href="{{route('login')}}"> Login</a> <a
                class="ml-5 hover:border-b-2 border-orange-500" href="{{route('register')}}"> Register</a></div>

    </div>
    <div class="flex justify-center">
        <img class="h-36" src="{{ URL('img/logo.png') }}" alt="">
    </div>
    <!-- Implement the carousel -->

    <div class="bg-gray-900 p-5 mx-20">
        <div class="relative w-[600px] mx-auto">
            <div class="slide relative">
                <img class="w-full h-[450px] object-cover" src="{{ URL($productos[0]->imagen) }}">
                <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                    {{ $productos[0]->nombre }}</div>
            </div>

            <div class="relative w-[600px] mx-auto">
                <div class="slide relative">
                    <img class="w-full h-[450px] object-cover" src="{{ URL($productos[1]->imagen) }}">
                    <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                        {{ $productos[1]->nombre }}</div>
                </div>
                <div class="relative w-[600px] mx-auto">
                    <div class="slide relative">
                        <img class="w-full h-[450px] object-cover" src="{{ URL($productos[2]->imagen) }}">
                        <div class="absolute bottom-0 w-full px-5 py-3 bg-black/40 text-center text-white">
                            {{ $productos[2]->nombre }}</div>
                    </div>

                </div>


            </div>
            <br>

            <!-- The dots -->
            <div class="flex justify-center items-center space-x-5">
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(1)"></div>
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(2)"></div>
                <div class="dot w-4 h-4 rounded-full cursor-pointer" onclick="currentSlide(3)"></div>
            </div>
            </div>
            </div>

            <div class="mt-10 h-80 text-center">
                <p class="text-orange-500">Welcome to <i>GCM electronics</i>! The web with handmade electronic's products.</p>
            </div>

            <footer class="flex justify-center bg-gray-900   w-full h-96 mt-1">
                <div class="bg-black text-white mt-4 w-full mx-10 h-5/6">
                    <div class="bg-black grid grid-rows-3 grid-flow-col gap-4  h-4/5">
                        <div class="absolute mt-10">
                            <p class="ml-44 text-2xl">gerardo@rentel.es</p>
                        </div>
                        <div class="inline-flex mt-20 ml-44 col-span-full">
                            <a href="https://www.youtube.com/channel/UC-t6s_YDUsRrJRGg3CrNxlA"><img class="mt-3 mr-1 w-8 h-8"
                                    src="{{ URL('img/youtube.png') }}" alt="facebook"> Gerardo Calado</a>
                        </div>
                        <div class="col-span-2 row-span-4 text-right mr-44 mt-10">
                            <p class="text-2xl">¿Tiene algún problema?</p>
                            <p class="text-xl mr-3 mt-2"> <a class="text-orange-500" href="#">Contacte</a> con nosotros
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full absolute mt-20">
                    <p class="text-center text-2xl"><a class="hover:text-orange-500 text-white" href="{{ route('productos') }}"> Nuestros
                            Productos</a>
                    </p>
                </div>
                <div class="w-50 h-auto absolute mt-36">
                    <a href="{{ route('productos') }}"><img style="height: 20%; width: 20%; margin-left:40%" class="mt-3 mr-1"
                        src="{{ URL('img/logo.png') }}" alt="logo"></a>
                </div>
            </footer>
            <!-- Javascript code -->
            <script>
                // set the default active slide to the first one
                let slideIndex = 1;
                showSlide(slideIndex);

                // change slide with the prev/next button
                function moveSlide(moveStep) {
                    showSlide(slideIndex += moveStep);
                }

                // change slide with the dots
                function currentSlide(n) {
                    showSlide(slideIndex = n);
                }

                function showSlide(n) {
                    let i;
                    const slides = document.getElementsByClassName("slide");
                    const dots = document.getElementsByClassName('dot');

                    if (n > slides.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = slides.length
                    }

                    // hide all slides
                    for (i = 0; i < slides.length; i++) {
                        slides[i].classList.add('hidden');
                    }

                    // remove active status from all dots
                    for (i = 0; i < dots.length; i++) {
                        dots[i].classList.remove('bg-white');
                        dots[i].classList.add('bg-orange-500');
                    }

                    // show the active slide
                    slides[slideIndex - 1].classList.remove('hidden');

                    // highlight the active dot
                    dots[slideIndex - 1].classList.remove('bg-orange-500');
                    dots[slideIndex - 1].classList.add('bg-white');
                }
            </script>
</body>

</html>
