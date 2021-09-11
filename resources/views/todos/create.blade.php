@extends('todos.layout')

@section('content')
    <h1 class="text-2xl border-b pb-4">What you next need to do?</h1>
    <x-alert/>
    <form method="POST" action="/todos/create" class="py-5 border">
            @csrf
            <input type="text" name="title" class="py-2 px-2 border rounded">
            <input type="submit" value="create" class="p-2 border rounded-lg">
    </form>
    <a href="/todos" class="m-5 p-1 bg-blue-400 text-white rounded cursor-pointer">Back</a>
@endsection