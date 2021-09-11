@if($todo->completed)
    <span onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()" class="fas fa-check cursor-pointer text-green-500">
        <form style="display: none" id="{{'form-incomplete-'.$todo->id}}" method="post" action="{{route('todo.incomplete',$todo->id)}}">
            @csrf
            @method('delete')
        </form>
    </span>
@else
    <span onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()" class="fas fa-check text-gray-300 mx-2 cursor-pointer">
        <form style="display: none" id="{{'form-complete-'.$todo->id}}" method="post" action="{{route('todo.complete',$todo->id)}}">
            @csrf
            @method('put')
        </form>
    </span>
@endif