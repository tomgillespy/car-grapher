<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
    <title>Car Grapher</title>
    <meta name="x-csrf" content="{{csrf_token()}}" />
    @livewireStyles
    @stack('styles')
  </head>
  <body>
    @yield('content')
    @livewireScripts
    @stack('scripts')
  </body>
</html>
