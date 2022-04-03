@extends('layout')
@section('content')
  <main>
    <div class="xl:h-screen bg-blue-50 overflow-hidden relative">
      <div class="sm:h-auto xl:h-full container mx-auto px-5 pb-2">
        <div class="columns-2xs">
          <div class="w-full">
            <h1>{{$vehicle->summary}}</h1>
          </div>
          <div class="w-full">
            <img src="{{$vehicle->image_url}}" />
          </div>
        </div>
      </div>
    </div><!-- End Hero -->
    <div class="container mx-auto sm:px-4">
      <hr class="bg-gray-400">
    </div>

    @include('footer')
  </main>
@endsection
