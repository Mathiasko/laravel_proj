<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('search', function (Request $request) {
  // /search?name=jano
  return $request->name; //jano
});

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard')->withViewData(['meta' => 'Dashboard']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/movie', function () {
  return Inertia::render('Movie')->withViewData(['meta' => 'Movie']);
})->name('movie');

Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo');
Route::post('/todo', [App\Http\Controllers\TodoController::class, 'add_task'])->name('add_task');
Route::delete('/todo/{id}', [App\Http\Controllers\TodoController::class, 'remove_task'])->name('remove_task');
Route::patch('/todo/{id}', [App\Http\Controllers\TodoController::class, 'edit_task'])->name('edit_task');

Route::get('/test', function () {
  return Inertia::render('Test');
})->name('test');

//PHP VIEWS

// -- ALL LISTINGS  --
Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/old', function () {
  return view('welcome');
})->name('old');

Route::get('/listings', function () {
  return view('listings', [
    'heading' => 'Latest Listings',
    'listings' => Listing::all()
  ]);
})->name('listings');

// -- ALL LISTINGS  --
Route::get('/listings/{id}', function ($id) {
  return view('listing', [
    'heading' => 'Listing by id',
    'listing' => Listing::find($id)
  ]);
})->name('listing');

Route::get('/abc', [App\Http\Controllers\AbcController::class, 'index'])->name('abc');

Route::get('/counter', [App\Http\Controllers\CounterController::class, 'index'])->name('counter');
Route::post('/counter/update', [App\Http\Controllers\CounterController::class, 'update'])->name('update');

// Route::get('/todo', [App\Http\Controllers\TodoController::class, 'index'])->name('todo');
// Route::post('/todo/clear_todo', [App\Http\Controllers\TodoController::class, 'clear_todo'])->name('clear_todo');
// Route::post('/todo/add_task', [App\Http\Controllers\TodoController::class, 'add_task'])->name('add_task');
// Route::post('/todo/remove_task', [App\Http\Controllers\TodoController::class, 'remove_task'])->name('remove_task');


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
