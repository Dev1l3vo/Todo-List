@extends('todos.layout')


@section('content')
<div class="flex justify-center border-b pb-4">
    <h1 class="text-2xl">All todos</h1>
    <a href="{{route('todo.create')}}" class="mx-5 py-1 px-1 bg-blue-400 text-white rounded cursor-pointer">Create New</a>
</div>
    <x-alert/>
    <ul>
        @foreach ($todos as $todo)
        <li class="flex justify-between p-4"> 
            @if($todo->completed)   
                <p class="line-through">{{$todo->title}}</p>
            @else
                <p>{{$todo->title}}</p>
            @endif
            <div>
                <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 cursor-pointer"> <span class="fas fa-edit px-2"/> </a>
                @include('todos.completeBtn')
                <span class="fas fa-trash text-red-500 cursor-pointer px-2" onclick="event.preventDefault();
                    if(confirm('Are you want to delete this todo')){
                        document.getElementById('form-delete-{{$todo->id}}').submit()
                    }
                "/>
                <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.delete',$todo->id)}}">
                    @csrf
                    @method('delete')
                </form>
            </div>
            
        </li>
        @endforeach
    </ul>
@endsection