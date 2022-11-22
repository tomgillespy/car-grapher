<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <title>Car Grapher</title>
    <meta name="x-csrf" content="{{csrf_token()}}"/>
    <meta name="title" content="Car Grapher">
    <meta name="description" content="Make your car search easier! Graph car results from car websites to get the perfect balance of cost/mileage/age!" />

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.car-grapher.co.uk/">
    <meta property="og:title" content="Car Grapher">
    <meta property="og:description" content="Make your car search easier! Graph car results from car websites to get the perfect balance of cost/mileage/age!">
    <meta property="og:image" itemprop="image" content="https://www.car-grapher.co.uk/img/index/hero-preview.png">

    @livewireStyles
    @stack('styles')
</head>
<body>
<nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 ">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
            <a
                class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white"
                href="{{url('/')}}"
            >Car Grapher</a
            >
            <button
                class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                type="button"
                onclick="toggleNavbar('example-collapse-navbar')"
            >
                <i class="text-white fas fa-bars"></i>
            </button>
        </div>
        <div
            class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar"
        >
            <ul class="flex flex-col lg:flex-row list-none mr-auto">
{{--                <li class="flex items-center">--}}
{{--                    <a--}}
{{--                        class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"--}}
{{--                        href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/landing"--}}
{{--                    ><i--}}
{{--                            class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"--}}
{{--                        ></i>--}}
{{--                        Docs</a--}}
{{--                    >--}}
{{--                </li>--}}
            </ul>
            <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
{{--                <li class="flex items-center">--}}
{{--                    <button--}}
{{--                        class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"--}}
{{--                        type="button"--}}
{{--                        style="transition: all 0.15s ease 0s;"--}}
{{--                    >--}}
{{--                        <i class="fas fa-arrow-alt-circle-down"></i> Download--}}
{{--                    </button>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
@yield('content')
<footer class="relative bg-gray-300 pt-8 pb-6">
    <div
        class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
        style="height: 80px;"
    >
        <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
        >
            <polygon
                class="text-gray-300 fill-current"
                points="2560 0 2560 100 0 100"
            ></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <hr class="my-6 border-gray-400" />
        <div
            class="flex flex-wrap items-center md:justify-between justify-center"
        >
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright &copy; {{now()->format('Y')}} Tom Gillespy. All Data retrieved from and &copy; Autotrader
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ mix('/js/app.js') }}"></script>
@livewireScripts
@stack('scripts')
</body>
</html>
