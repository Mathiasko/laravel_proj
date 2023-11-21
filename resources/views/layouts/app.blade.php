<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="container">
        <div class="box">
          <div style="margin-bottom:20px" className="flex flex-col">
            <a href="{{route('old')}}">Home</a>
            <a href="{{route('listings')}}">Listings</a>
            <a href="{{route('abc')}}">ABC</a>
            <a href="{{route('counter')}}">counter</a>
            {{-- <a href="{{route('Welcome')}}">To React</a> --}}
          </div>
        </div>
      </div>
    </nav>

    <main class="">
      @yield('content')
    </main>
  </div>
</body>

</html>