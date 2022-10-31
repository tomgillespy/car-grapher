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
                href="https://www.creative-tim.com/learning-lab/tailwind-starter-kit#/presentation"
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
{{--        <div class="flex flex-wrap">--}}
{{--            <div class="w-full lg:w-6/12 px-4">--}}
{{--                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>--}}
{{--                <h5 class="text-lg mt-0 mb-2 text-gray-700">--}}
{{--                    Find us on any of these platforms, we respond 1-2 business days.--}}
{{--                </h5>--}}
{{--                <div class="mt-6">--}}
{{--                    <button--}}
{{--                        class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"--}}
{{--                        type="button"--}}
{{--                    >--}}
{{--                        <i class="flex fab fa-twitter"></i></button--}}
{{--                    ><button--}}
{{--                        class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"--}}
{{--                        type="button"--}}
{{--                    >--}}
{{--                        <i class="flex fab fa-facebook-square"></i></button--}}
{{--                    ><button--}}
{{--                        class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"--}}
{{--                        type="button"--}}
{{--                    >--}}
{{--                        <i class="flex fab fa-dribbble"></i></button--}}
{{--                    ><button--}}
{{--                        class="bg-white text-gray-900 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"--}}
{{--                        type="button"--}}
{{--                    >--}}
{{--                        <i class="flex fab fa-github"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="w-full lg:w-6/12 px-4">--}}
{{--                <div class="flex flex-wrap items-top mb-6">--}}
{{--                    <div class="w-full lg:w-4/12 px-4 ml-auto">--}}
{{--                <span--}}
{{--                    class="block uppercase text-gray-600 text-sm font-semibold mb-2"--}}
{{--                >Useful Links</span--}}
{{--                >--}}
{{--                        <ul class="list-unstyled">--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://www.creative-tim.com/presentation"--}}
{{--                                >About Us</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://blog.creative-tim.com"--}}
{{--                                >Blog</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://www.github.com/creativetimofficial"--}}
{{--                                >Github</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://www.creative-tim.com/bootstrap-themes/free"--}}
{{--                                >Free Products</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="w-full lg:w-4/12 px-4">--}}
{{--                <span--}}
{{--                    class="block uppercase text-gray-600 text-sm font-semibold mb-2"--}}
{{--                >Other Resources</span--}}
{{--                >--}}
{{--                        <ul class="list-unstyled">--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md"--}}
{{--                                >MIT License</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://creative-tim.com/terms"--}}
{{--                                >Terms &amp; Conditions</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://creative-tim.com/privacy"--}}
{{--                                >Privacy Policy</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a--}}
{{--                                    class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"--}}
{{--                                    href="https://creative-tim.com/contact-us"--}}
{{--                                >Contact Us</a--}}
{{--                                >--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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
@livewireScripts
@stack('scripts')
</body>
</html>
