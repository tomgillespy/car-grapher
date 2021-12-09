@extends('layout')
@section('content')
  <main>
    <div class="xl:h-screen bg-blue-50 overflow-hidden relative"><!-- Start Hero -->
      <div class="sm:h-96 xl:h-full container mx-auto px-5">
        <div class="absolute top-8">
          <a href="#"><img src="/img/logo.png" alt=""></a>
        </div>
        <div class="xl:h-full grid gap-y-8 sm:gap-y-0 sm:gap-x-10 sm:grid-cols-2 mt-32 xl:mt-auto content-center">
          <div class="sm:col-span-1 space-y-5 md:space-y-8">
            <h1 class="text-4xl sm:text-5xl xl:text-7xl font-semibold">Make your car search easier.</h1>
            <p class="max-w-sm text-lg md:text-2xl">Paste your autotrader link in to graph mileage/cost results for different cars!</p>
            <form method="POST" action="{{route('job.view')}}">
              @method('POST')
              @csrf
              <p class="w-full text-lg md:text:2xl">
                <label class="text-sm font-bold" for="url">
                  URL:
                </label>
                <input name="url" value="{{old('url')}}" class="shadow appearance-none border {{$errors->has('url') ? 'border-red-500' : ''}} rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="url" type="text" placeholder="http://">
                @if($errors->has('url'))
                  <span class="w-full border-red-500 text-gray-600 mt-3 mb-3 block">
                    {{$errors->first('url')}}
                  </span>
                @endif
                <button class="bg-transparent mx-auto hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                  Graph Results!
                </button>
              </p>
            </form>
          </div>
        </div>
      </div>
    </div><!-- End Hero -->

    <section class="container mx-auto px-5 py-12 lg:py-28"><!-- Start About App -->
      <div class="grid gap-4 md:gap-10 lg:grid-cols-3">
        <div class="">
          <h2 class="text-2xl md:text-3xl font-semibold">About Our App</h2>
        </div>
        <div class="lg:col-span-2">
          <p class="text-lg md:text-2xl">
            Inspired by a post on <a target="_blank" rel="nofollow" href="https://reddit.com/r/carTalkUK">/r/carTalkUK</a>, this tool graphs certain information about cars from autotrader.
          </p>
        </div>
      </div>
    </section><!-- End About App -->

    <div class="container mx-auto sm:px-4">
      <hr class="bg-gray-400">
    </div>

    @include('footer')
  </main>
@endsection
