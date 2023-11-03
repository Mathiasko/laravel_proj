@extends('layouts.app')

@section('content')
<head>
  <title>ToDo</title>
  <style>
    ul {
      list-style-type: none;
      padding: 0;
    }

    li {
      cursor: pointer;
      margin: 5px;
    }
  </style>
</head>

<body>
  <h1>ToDo list:</h1>
  <ul>
    @if (count($tasks) > 0)
    @foreach ($tasks as $task)
    <li onclick="removeTask('{{$task->id}}')">
      {{ $task->value }} - {{ $task->id }}
    </li>
    @endforeach
    @endif
  </ul>

  {{-- <div id="app" data-tasks="{{ json_encode($tasks) }}"></div> --}}

  <form method="POST" action="{{ route('add_task') }}">
    @csrf
    <input type="text" name="task" placeholder="Task">
    <button type="submit">Submit</button>
  </form>

  <form method="POST" action="{{ route('clear_todo') }}">
    @csrf
    <button type="submit">Clear ToDo</button>
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