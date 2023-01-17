<main class="profile-page">
    <section class="relative block" style="height: 400px;">
        <div
            class="absolute top-0 w-full h-full bg-cover"
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
    <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64 min-h-screen"
            >
                <div class="px-6">
                    <div class="flex flex-wrap justify-center">
                        <div
                            class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                        >
                            <div class="relative">
                                @if($exampleVehicle)
                                    <img
                                        alt="{{$exampleVehicle->vehicleMake->make}} {{$exampleVehicle->vehicleModel->model}} {{$exampleVehicle->year}}"
                                        src="{{$exampleVehicle->image_url}}"
                                        class="shadow-xl rounded-full h-auto align-middle bg-white border-none absolute -m-16 -ml-20 lg:-ml-16"
                                        style="max-width: 150px;"
                                    />
                                @else
                                    <img
                                        alt=""
                                        src="{{url('/img/loading.gif')}}"
                                        class="shadow-xl rounded-full h-auto align-middle bg-white border-none absolute -m-16 -ml-20 lg:-ml-16"
                                        style="max-width: 150px;"
                                    />
                                @endif
                            </div>
                        </div>
                        <div
                            class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                        >
                            <div class="py-6 px-3 mt-32 sm:mt-0">
                                <button
                                    class="bg-blue-400 hover:bg-blue-700 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                    type="button"
                                    style="transition: all 0.15s ease 0s;"
                                >
                                    Cancel
                                </button>
                                <button
                                    class="bg-red-400 hover:bg-purple-700 active:bg-red-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                    type="button"
                                    style="transition: all 0.15s ease 0s;"
                                    wire:click="getNextPage"
                                >
                                    Get Next Page
                                </button>
                            </div>
                        </div>
                        <div class="w-full lg:w-4/12 px-4 lg:order-1">
                            <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                <div class="mr-4 p-3 text-center">
                      <span
                          class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >{{$page}}</span
                      ><span class="text-sm text-gray-500">Page</span>
                                </div>
                                <div class="mr-4 p-3 text-center">
                      <span
                          class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >{{$vehicleCount}}</span
                      ><span class="text-sm text-gray-500">Vehicles</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <h3
                            class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                        >
                            {{$params['make']}}
                        </h3>
                        <div
                            class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                        >
                            {{$params['model']}}
                        </div>
                    </div>
                    @if(!$isFinished && !$isCancelled)
{{--                        <div class="mt-10 py-10 border-t border-gray-300 text-center" wire:poll.10000ms="getNextPage">--}}
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Please wait while we fetch the vehicles from autotrader. This may take a few minutes.
                                    </p>
                                </div>
                            </div>
                        </div>
                        @elseif($isCancelled)
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Scrape Finished. <a href="{{route('results.show', ['result' => $scrape])}}">View Results</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @elseif($isFinished)
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <p class="mb-4 text-lg leading-relaxed text-gray-800">
                                        Scrape Finished. <a href="{{route('results.show', ['result' => $scrape])}}">View Results</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@push('scripts')
    <script>
        window.addEventListener('livewire:load', function () {
            window.livewire.on('getNextPage', (pageToLoad) => {
                corsGet(pageToLoad).then((response) => {
                    window.livewire.emit('postNextPage', response);
                });
            });
        });
    </script>
@endpush
