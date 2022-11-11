@extends('layouts.master')
@section('content')



            <div class="row">
                {{-- <div class="col-md-6"> --}}
                    <div class="table-title">
                        <div class="row">
                            @if (Session::has('true'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('true')}}
                                </div>
                            @endif
                            <div class="col-sm-8">
                                <div class="follow">
                                    <a class="btn btn-shadow" href="{{route('brief.create')}}"><i class="la la-user-plus"></i>Ajouter Brief</a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Recherche&hellip;" id="search">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered promotion">
                        <thead>
                            <tr>
                                <th class="start">Nom </th>
                                <th>Date de livraison </th>
                                <th>Date de recuperation </th>
                                <th>Ajouter tâche</th>
                                <th>Assigner brief</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="div">
                            @foreach ($briefs as $value)
                            <tr>
                                <td class="start"> <a href="{{route('brief.edit', $value->token)}}" class="promoA"> {{$value->name}}</a></td>
                                <td>{{$value->livraisonDate}}</td>
                                <td>{{$value->recuperationDate}}</td>
                                <td><a href="{{route('task.create', $value->token)}}">+ tâche</a></td>
                                <td><a href="{{route('assignement.show', $value->token)}}">affecter</a></td>
                                <td>
                                    {{-- <a href="{{route('promotion.edit', $value->token)}}"  class="edit"><i class="material-icons">&#xE254;</i></a> --}}
                                    <form method="post" action="{{route('brief.destroy',$value->token)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('assets/js/searchBrief.js')}}"></script>
@endsection
            
        
