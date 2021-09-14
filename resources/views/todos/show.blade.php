@extends('todos.layout')

@section('content')
    <div class="flex justify-around border-b pb-4">
        <h1 class="text-2xl">{{$todo->title}}</h1>
        <a href="{{route('todo.index')}}" class="mx-4 py-1 px-1 text-gray-500 scaled cursor-pointer"><span class="fas fa-reply"/> </a>
    </div>
            <p>{{$todo->description}}</p>
@endsection