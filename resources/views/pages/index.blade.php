@extends('layout')
@section('content')

<main>
    <div
        class="relative pt-16 pb-32 flex content-center items-center justify-center"
        style="min-height: 75vh;"
    >
        <div
            class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("/img/index/hero.png");'
        >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                    <div class="pr-12">
                        <h1 class="text-white font-semibold text-5xl">
                            Start your car journey on <a class="text-blue-400" rel="noreferrer" href="http://www.autotrader.co.uk">Autotrader</a>, then here.
                        </h1>
                        <h2 class="text-white font-bold text-4xl mt-5 mb-5 border-red-500 border-2 p-5">
                            NB: This tool is currently in development. It may not work as expected.
                        </h2>
                        <p class="mt-4 text-lg text-gray-300">
                            Find your car search criteria on autotrader, then come here for a couple
                            of easy to use tools to make the most of your search!
                        </p>
                        <div class="relative w-full mb-3 mt-5">
                            <label
                                class="block uppercase text-white text-xs font-bold mb-2"
                                for="url"
                            >Search URL</label
                            ><input
                                type="text"
                                class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                placeholder="https://www.autotrader.co.uk/....."
                                style="transition: all 0.15s ease 0s;"
                                id="url"
                            />
                        </div>
                        <div class="text-center mt-6">
                            <button
                                class="bg-blue-800 hover:bg-blue-500 text-white active:bg-blue-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                            >
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px;"
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
    </div>

    <section class="relative py-20">
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
                    class="text-white fill-current"
                    points="2560 0 2560 100 0 100"
                ></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="items-center flex flex-wrap">
                <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                    <img
                        alt="..."
                        class="max-w-full rounded-lg shadow-lg"
                        src="/img/index/cars.jpg"
                    />
                </div>
                <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                    <div class="md:pr-12">
                        <h3 class="text-3xl font-semibold">About this tool</h3>
                        <p class="mt-4 text-lg leading-relaxed text-gray-600">
                            Inspired by a post on <a class="text-blue-400" href="http://reddit.com/r/carTalkUK">/r/carTalkUK</a>,
                            this tool attempts to give you a little insight into how some cars compare on autotrader, without having
                            to use spreadsheets.
                        </p>
                        <ul class="list-none mt-6">
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-black mr-3"
                        ><i class="fas fa-fingerprint"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">
                                            Enter Your Search URL
                                        </h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-black mr-3"
                        ><i class="fab fa-html5"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">Wait for the tool to find all the cars with that search - this can take a few mins!</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="py-2">
                                <div class="flex items-center">
                                    <div>
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-black mr-3"
                        ><i class="far fa-paper-plane"></i
                            ></span>
                                    </div>
                                    <div>
                                        <h4 class="text-gray-600">View the results and organise/download them as you wish!</h4>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
