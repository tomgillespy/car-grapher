<main class="profile-page">
    <section class="relative block" style="height: 100px;">
        <div
            class="absolute top-0 w-full h-full  bg-cover"
            style='background-image: url("{{url('/img/index/hero.png')}}");'
        >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-50 bg-black"
          ></span>
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
    </section>
    <section class="relative py-16">
        <div class="container mx-auto px-4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full py-4 mb-6 shadow-xl -mt-64"
            >
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <img
                            alt=""
                            src="https://placekitten.com/200/200"
                            class="shadow-xl rounded-full h-auto align-middle border-none -m-16 -ml-20 lg:-ml-16"
                            style="max-width: 150px;"
                        />
                    </div>
                    <div class="text-center mt-12">
                        <h3
                            class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                        >
                            Jenna Stones
                        </h3>
                        <div
                            class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                        >
                            <i
                                class="fas fa-map-marker-alt mr-2 text-lg text-gray-500"
                            ></i>
                            Los Angeles, California
                        </div>
                        <div class="mb-2 text-gray-700 mt-10">
                            <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i
                            >Solution Manager - Creative Tim Officer
                        </div>
                        <div class="mb-2 text-gray-700">
                            <i class="fas fa-university mr-2 text-lg text-gray-500"></i
                            >University of Computer Science
                        </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-gray-300 text-center">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                    An artist of considerable range, Jenna the name taken by
                                    Melbourne-raised, Brooklyn-based Nick Murphy writes,
                                    performs and records all of his own music, giving it a
                                    warm, intimate feel with a solid groove structure. An
                                    artist of considerable range.
                                </p>
                                <a href="#pablo" class="font-normal text-pink-500"
                                >Show more</a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
