@extends('layouts.app')

@section('content')

<head>
  <title>Counter</title>
</head>

<body>
  <h1>Counter Value: {{ $count }}</h1>
  <form method="POST" action="{{ route('update') }}">
    @csrf
    <input type="number" name="step" value="1" min="1">
    <button type="submit" name="increment">Increment</button>
    <button type="submit" name="decrement">Decrement</button>
  </form>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</body>

@endsection