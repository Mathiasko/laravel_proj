<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CounterController extends Controller
{
  public function index()
  {
    $count = session('count', 0);
    return view('counter', compact('count'));
  }



  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'step' => 'required|integer|between:1,4',
    ]);

    if ($validator->fails()) {

      return redirect()->route('counter')->withErrors($validator)->withInput();
    }

    $count = session('count', 0);
    $step = $request->input('step', 1);

    if ($request->has('increment')) {
      $count += $step;
    } elseif ($request->has('decrement')) {
      $count -= $step;
    }

    session(['count' => $count]);

    return redirect()->route('counter');
  }
}
