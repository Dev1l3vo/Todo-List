@extends('todos.layout')

@section('content')
    <div class="flex justify-around border-b pb-4">
        <h1 class="text-2xl">What you next need to do?</h1>
        <a href="{{route('todo.index')}}" class="mx-4 py-1 px-1 text-gray-500 scaled cursor-pointer"><span class="fas fa-reply"/> </a>
    </div>
    <x-alert/>
    <form method="POST" action="{{route('todo.store')}}" class="py-5 text-center">
            @csrf
            <div class="py-1">
                <input type="text" name="title" placeholder='Title' class="py-2 px-2 border rounded">
            </div>
            <div class="py-2">
                <textarea name="description" placeholder='Description' class="p-2 rounded border"></textarea>
            </div>
            <input type="submit" value="create" class="p-2 border rounded-lg">
    </form>
@endsection