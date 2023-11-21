<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
  public function index()
  {
    return Inertia::render('Todo', ['tasks' => Task::all(), 'test' => 'test'])->withViewData(['meta' => 'TODO']);
  }

  public function clear_todo()
  {
    session()->forget('tasks');
    return redirect()->route('todo');
  }

  public function edit_task($id, Request $request)
  {
    $validator = Validator::make($request->all(), [
      'value' => 'required|string',
    ]);

    if ($validator->fails()) {
      return redirect()->route('todo')->withErrors($validator)->withInput();
    }

    $newValue = $request->input('value', 'no str');
    $task = Task::find($id);
    $task->value = $newValue;
    $task->save();
    return redirect()->route('todo');
  }

  public function remove_task(Task $id)
  {
    $id->delete();
    return redirect()->route('todo');
  }

  public function add_task(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'value' => 'required|string',
    ]);

    if ($validator->fails()) {
      return redirect()->route('todo')->withErrors($validator)->withInput();
    }

    $task = $request->input('value', 'no str');
    $newTask = new Task(['value' => $task]);

    $newTask->save();

    return to_route('todo');
  }
}
