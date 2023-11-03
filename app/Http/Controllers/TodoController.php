<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TodoController extends Controller
{
  public function index()
  {
    $tasks = session('tasks', []);
    return view('todo', compact('tasks'));
  }

  public function clear_todo()
  {
    session()->forget('tasks');
    return redirect()->route('todo');
  }

  public function remove_task(Request $request)
  {
      $taskId = $request->input('taskId');
      $tasks = session('tasks', []);
  
      $tasks = array_filter($tasks, function ($task) use ($taskId) {
          return $task->id !== $taskId;
      });
  
      session(['tasks' => $tasks]);
  
      return response()->json(['success' => true]);
  }  

  public function add_task(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'task' => 'required|string',
    ]);

    if ($validator->fails()) {
      return redirect()->route('todo')->withErrors($validator)->withInput();
    }

    $tasks = session('tasks', []);
    $task = $request->input('task', 'no str');
    $newTask = new Task($task);
    $tasks[] = $newTask;

    session(['tasks' => $tasks]);

    return redirect()->route('todo');
  }
}

class Task
{
  public $id;
  public $value;

  public function __construct($value)
  {
    $uuid = Str::uuid();
    $this->id = $uuid;
    $this->value = $value;
  }
}
