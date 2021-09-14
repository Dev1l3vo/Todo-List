<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoResourceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',function(){
    return redirect(route('todo.index'));
});

Route::resource('/todo',TodoController::class);
Route::put('/todo/{todo}/complete',[TodoController::class,'complete'])->name('todo.complete');
Route::delete('/todo/{todo}/incomplete',[TodoController::class,'incomplete'])->name('todo.incomplete');


// Route::get('/todos', [TodoController::class,'index'])->name('todo.index');

// Route::get('/todos/create',[TodoController::class,'create'])->name('todo.create');
// Route::post('/todos/create',[TodoController::class,'store']);


// Route::patch('/todos/{todo}/update',[TodoController::class,'update'])->name('todo.update');
// Route::get('/todos/{todo}/edit',[TodoController::class,'edit'])->name('todo.edit');//laravel get id and automatically return todo object(because Todo object is needed for edit method)


// Route::delete('/todos/{todo}/delete',[TodoController::class,'delete'])->name('todo.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
