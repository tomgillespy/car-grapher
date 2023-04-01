@extends('layout')
@section('content')
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
                                    <img
                                        alt="{{$result->vehicles[0]->make_name}} {{$result->vehicles[0]->model_name}} {{$result->vehicles[0]->year}}"
                                        src="{{$result->vehicles[0]->image_url}}"
                                        class="shadow-xl rounded-full h-auto align-middle bg-white border-none absolute -m-16 -ml-20 lg:-ml-16"
                                        style="max-width: 150px;"
                                    />
                                </div>
                            </div>
                            <div
                                class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                            >
                                <div class="py-6 px-3 mt-32 sm:mt-0">
                                    <a
                                        class="bg-blue-400 hover:bg-blue-700 active:bg-blue-700 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1"
                                        type="button"
                                        style="transition: all 0.15s ease 0s;"
                                        href="{{route('results.show', ['result' => $result])}}"
                                    >
                                        Back to Main Results
                                    </a>
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                      <span
                          class="text-xl font-bold block uppercase tracking-wide text-gray-700"
                      >{{count($result->vehicles)}}</span
                      ><span class="text-sm text-gray-500">Vehicles</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-12">
                            <h3
                                class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                            >
                                {{$result->vehicles[0]->make_name}}
                            </h3>
                            <div
                                class="text-sm leading-normal mt-0 mb-2 text-gray-500 font-bold uppercase"
                            >
                                {{$result->vehicles[0]->model_name}}
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t border-gray-300 text-center">
                            <div class="flex flex-wrap justify-center">
                                <canvas id="mileageVsPriceChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        const chx = document.getElementById('mileageVsPriceChart');

        new Chart(chx, {
            type: 'scatter',
            data: {!! json_encode($data) !!},
            options: {
                scales: {
                    x: {
                        beginAtZero: true,
                        type: 'linear',
                        position: 'bottom',
                    },
                    y: {
                        beginAtZero: true,
                        type: 'linear',
                        position: 'bottom',
                    }
                },
                onClick: (event, elements, chart) => {
                    if (elements.length > 0) {
                        const data = elements[0].element.$context.raw;
                        window.open(data.vehicle.service_link, '_blank');
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const data = context.raw.vehicle;
                                return `Price: £${data.current_price}, ${data.mileage} miles, ${data.year} ${data.make_name} ${data.model_name}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endpush
