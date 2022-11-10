
<p>brief : {{$brief->name}}</p>

<a href="{{route('assignAll',['id' => $brief->id])}}">
    {{-- <input type="hidden" name="brief_id" value="{{}}"> --}}
    add all</a>

@foreach ($students as $value)
        @if (is_null($brief->students()->find($value->id)))
        <p>{{$value->name}} <p>
        <form action="{{route('assignement.store')}}" method="post">
            @csrf
            <input type="hidden" name="student_id" value="{{$value->id}}">
            <input type="hidden" name="brief_id" value="{{$brief->id}}">
            <button type="submit"> + </button>    
        </form> 
        @else    
        <p style="color: red">{{$value->name}} <p>
            <form action="{{route('assignement.destroy', $value->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="student_id" value="{{$value->id}}">
                <input type="hidden" name="brief_id" value="{{$brief->id}}">
                <button type="submit"> - </button>    
            </form> 
        @endif 
        
@endforeach
