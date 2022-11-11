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
        <input type="hidden" id="token" value="{{$brief->token}}">
        <form action="{{route('brief.update', $brief->token)}}" method="post" class='edit'>
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" value="{{$brief->name}}" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <div class="input-group mb-3">
            <input type="date" class="form-control" name="livraisonDate" value="{{$brief->livraisonDate}}" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <input type="date" class="form-control" name="recuperationDate" value="{{$brief->recuperationDate}}" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <button class="input-group-text butn" id="basic-addon2" type="submit" style="position: unset"><i class="material-icons">&#xE254;</i> Modifier</button>
        @error('name')
          <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
</div>
    
</div>


         <div class="student">
            <div class="row searchStd editPro">
                <div class="col-sm-8">
                    <a href="{{route('task.create', ['token' => $brief->token])}}" class='addRoute'>+ Ajouter tâche</a>
                </div>
                <div class="col-sm-4">
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" placeholder="Recherche&hellip;" id="searchS">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover table-bordered promotion">
            <thead>
                <tr>
                    <th class="start">Nom </th>
                    <th>Date debut </th>
                    <th>Date fin </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="div">
                @foreach ($tasks as $value)
                <tr>
                    <td class="start"> <a href="{{route('task.edit', $value->id)}}" class="promoA"> {{$value->name}}</a></td>
                    <td>{{$value->startDate}}</td>
                    <td>{{$value->endDate}}</td>
                    <td>
                        {{-- <a href="{{route('promotion.edit', $value->token)}}"  class="edit"><i class="material-icons">&#xE254;</i></a> --}}
                        <form method="post" action="{{route('task.destroy',$value->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



@endsection

