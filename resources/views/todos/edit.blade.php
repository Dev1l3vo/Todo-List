@extends('todos.layout')

@section('content')
    <div class="flex justify-around border-b pb-4">
        <h1 class="text-2xl">Update this todo</h1>
        <a href="{{route('todo.index')}}" class="mx-3 py-1 px-1 text-gray-500 scaled cursor-pointer"><span class="fas fa-reply"/> </a>
    </div>
    <x-alert/>
    <form method="post" action="{{route('todo.update',$todo->id)}}" class="py-5">
            @csrf
            @method('patch')
            <div class="py-1">
                <input type="text" name="title" value="{{$todo->title}}" class="py-2 px-2 border rounded">
            </div>
            <div class="py-2">
                <textarea name="description"  class="p-2 rounded border">{{$todo->description}}</textarea>
            </div>
            <input type="submit" value="Update" class="p-2 border rounded-lg">
    </form>
@endsection