@extends('layouts.master')
@section('content')

<form action="{{route('promotion.store')}}" method="post" class="add">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <button class="input-group-text" id="basic-addon2" type="submit"><i class="fa-solid fa-plus"></i> Ajouter</button>
    </div>
    @error('name')
      <p class="text-danger">{{$message}}</p>
    @enderror
</form>
@endsection