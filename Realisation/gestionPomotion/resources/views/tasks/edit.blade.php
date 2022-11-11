@extends('layouts.master')
@section('content')
@if (Session::has('false'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('false')}}
    </div>
@endif
@if (Session::has('true'))
    <div class="alert alert-success" role="alert">
        {{Session::get('true')}}
    </div>
@endif
<div class="row editProJs">
    <div class="">
        <form action="{{route('task.update', $task->id)}}" method="post" class='edit'>
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input type="hidden" name="brief_id" value="{{$task->brief->id}}">
            <input type="text" class="form-control" name="name" value="{{$task->name}}" placeholder="Nom" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <div class="input-group mb-3">
            <input type="date" class="form-control" name="startDate" value="{{$task->startDate}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="date" class="form-control" name="endDate" value="{{$task->endDate}}" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <button class="input-group-text butn" id="basic-addon2" type="submit" style="position: unset"><i class="material-icons">&#xE254;</i> Modifier</button>
        @error('name')
          <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
</div>
    
</div>

@endsection
