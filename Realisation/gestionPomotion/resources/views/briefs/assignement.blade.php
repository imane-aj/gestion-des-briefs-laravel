@extends('layouts.master')
@section('content')

<h4 class='my-3'>Brief: {{$brief->name}}</h4>

<a href="{{route('assignAll',['id' => $brief->id])}}">Assigner toute la class</a>
<div class="row my-3">
    @foreach ($students as $value)
        @if (!in_array($value->id, $assigned))
        <div class="Assign">
            <div class="col-md-4">
                <p>{{$value->name}} <p>
            </div>
            <div class="col-md-6">
                <form action="{{route('assignement.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="student_id" value="{{$value->id}}">
                    <input type="hidden" name="brief_id" value="{{$brief->id}}">
                    <input type="hidden" name="promotion_id" value="{{$value->promotion_id}}">
                    <button type="submit" class="assign"> + </button>    
                </form> 
            </div>
        </div>
        @else 
            <div class="Assign">
                <div class="col-md-4"> 
                    <p style="color: red">{{$value->name}} </p>
                </div>
                <div class="col-md-6">
                    <form action="{{route('assignement.destroy', $value->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="student_id" value="{{$value->id}}">
                        <input type="hidden" name="brief_id" value="{{$brief->id}}">
                        <button type="submit" class="assign" style="border-color: red"> - </button>    
                    </form> 
                </div>
            </div>
        @endif   
    @endforeach
</div>

@endsection   