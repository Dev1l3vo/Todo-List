@extends('todos.layout')

@section('content')
    <h1 class="text-2xl border-b pb-4">Update this todo</h1>
    
    <x-alert/>
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5 border">
            @csrf
            @method('patch')
            <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded">
            <input type="submit" value="Update" class="p-2 border rounded-lg">
    </form>
    <a href="/todos" class="m-5 p-1 bg-blue-400 text-white rounded cursor-pointer">Back</a>
@endsection