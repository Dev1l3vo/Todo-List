<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');   
    }


    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index',compact('todos'));
    }

    public function create(){
        return view('todos.create');
    }

    public function store(TodoCreateRequest $request)
    {
        //dd(auth()->user()->todos());
        auth()->user()->todos()->create($request->all());
        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit',compact('todo'));
    }

    public function update(TodoCreateRequest $request,Todo $todo){//from request we get data for update and update curr todo model
        $todo->update(['title' => $request->title,'description' => $request->description]);
        return redirect()->route('todo.index')->with('message','Updated');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=>true]);
        return redirect()->back()->with('message',"Todo({$todo->title}) marked as completed");
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=>false]);
        return redirect()->back()->with('message',"Todo({$todo->title}) marked as incompleted");
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'))->with('message',"Todo was deleted successfully");
    }

    public function show(Todo $todo){
        return view('todos.show',compact('todo'));
    }


}
