@extends('layouts.app')

@section('content')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>old HOME</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->

</head>

<div
  class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
  @if (Route::has('login'))
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    @auth
    <a href="{{ url('/home') }}" class=""> Home</a>
    @else
    <a href="{{ route('login') }}" class="">Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="">Register</a>
    @endif
    @endauth
  </div>
  @endif
</div>
@endsection