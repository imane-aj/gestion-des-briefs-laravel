@extends('layouts.master')
@section('content')

<form action="{{route('task.store', $brief->token)}}" method="post" class="add">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Nom" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    <div class="input-group mb-3">
        <input type="date" class="form-control" name="startDate" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <input type="date" class="form-control" name="endDate" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <input type="hidden" name="brief_id" value="{{$brief->id}}">
    </div>
    <button class="input-group-text" id="basic-addon2" type="submit"><i class="fa-solid fa-plus"></i> Ajouter</button>
    @error('name')
      <p class="text-danger">{{$message}}</p>
    @enderror
</form>
@endsection     
              