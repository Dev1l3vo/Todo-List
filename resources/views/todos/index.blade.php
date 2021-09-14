@extends('todos.layout')


@section('content')
<div class="flex justify-around border-b pb-4">
    <h1 class="text-2xl">All todos</h1>
    <a href="{{route('todo.create')}}" class="mx-4 py-1 px-1  text-blue-400 rounded scaled cursor-pointer"><span class="fas fa-plus-circle" /></a>
</div>
    <x-alert/>
    <ul>
        @forelse ($todos as $todo)
            <li class="flex justify-between p-4"> 
                <a href="{{route('todo.show',$todo->id)}}"> 
                    @if($todo->completed)   
                        <p class="line-through">{{$todo->title}}</p>
                    @else
                        <p>{{$todo->title}}</p>
                    @endif
                </a>
                <div>
                    <a href="{{route('todo.edit',$todo->id)}}" class="text-orange-400 cursor-pointer"> <span class="fas fa-edit px-2"/> </a>
                    @include('todos.completeBtn')
                    <span class="fas fa-trash text-red-500 cursor-pointer px-2" onclick="event.preventDefault();
                        if(confirm('Are you want to delete this todo')){
                            document.getElementById('form-delete-{{$todo->id}}').submit()
                        }
                    "/>
                    <form style="display: none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.destroy',$todo->id)}}">
                        @csrf
                        @method('delete')
                    </form>
                </div>
                
            </li>
        @empty
            <p>No tasks are available</p>
        @endforelse

    </ul>
@endsection