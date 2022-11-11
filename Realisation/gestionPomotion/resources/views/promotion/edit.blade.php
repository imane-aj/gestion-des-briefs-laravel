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
        <input type="hidden" id="token" value="{{$promotion->id}}">
        <form action="{{route('promotion.update', $promotion->token)}}" method="post" class='edit'>
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <p class='title' onclick="change()">{{$promotion->name}}</p>
            <input type="text" value="{{$promotion->name}}" class="form-control input" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button class="input-group-text butn" id="basic-addon2" type="submit"><i class="material-icons">&#xE254;</i> Modifier</button>
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </form>
</div>
    
</div>


        <div class="student">
            <h3>les briefs de cette promotion: @foreach ($assigns as $value)
                <span>{{$value->name}}/</span>
            @endforeach</h3>
            <div class="row searchStd editPro">
                <div class="col-sm-8">
                    <a href="{{route('student.create', ['token' => $promotion->token])}}" class='addRoute'>Ajouter Student</a>
                </div>
                <div class="col-sm-4">
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" placeholder="Recherche&hellip;" id="searchS">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="div">
            @foreach ($studentPromo as $value)
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-horizontal-rounded"></i></a>
                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="{{route('student.edit', $value->id)}}"> Edit</a>
                                    <span class="dropdown-item"><form method="post" action="{{route('student.destroy',$value->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="delete" style="background: unset;border: unset;padding: 0;"> Delete</button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="img"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-md rounded-circle img-thumbnail" /></div>
                                <div class="flex-1 ms-3">
                                    {{-- <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Phyllis Gatlin</a></h5> --}}
                                </div>
                            </div>
                            <div class="mt-3 pt-1 info">
                                <p class="text-muted mb-0"><i class="fa-regular fa-user"></i> Nom: {{$value->name}}</p>
                                <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-user"></i> Prenom: {{$value->lastName}}</p>
                                <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-envelope"></i> {{$value->email}}</p>
                            </div>
                            <div class="d-flex gap-2 pt-4">
                                <button type="button" class="btn btn-soft-primary btn-sm w-50"><i class="bx bx-user me-1"></i> Profile</button>
                                <button type="button" class="btn btn-primary btn-sm w-50 contact"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>









<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('assets/js/studentSearch.js')}}"></script>

@endsection

