@extends('layouts.master')
@section('content')
    <section class="credit-card">
        <div class="card-holder">
            <div class="card-box bg-news">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="img-box">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <form action="{{ route('student.store', $token) }}" method="post">
                            <div class="card-details">
                                <h3 class="title">Student Details</h3>
                                <div class="row">
                                        @csrf
                                        <div class="form-group col-sm-7">
                                            <div class="inner-addon right-addon">
                                                <label for="card-holder">Nom</label>
                                                <i class="far fa-user"></i>
                                                <input id="card-holder" type="text" class="form-control"
                                                    placeholder="Nom" name="name" aria-label="Card Holder"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group col-sm-5">
                                            <label for="">Prenom</label>
                                            <div class="input-group expiration-date">
                                                <input type="text" class="form-control" name="lastName"
                                                    placeholder="Prenom" aria-label="YY" aria-describedby="basic-addon1">
                                            </div>
                                            @error('lastName')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <div class="inner-addon right-addon">
                                                <label for="card-number">Email</label>
                                                <i class="far fa-credit-card"></i>
                                                <input id="card-number" type="text" name="email" class="form-control"
                                                    placeholder="Email" aria-label="Card Holder"
                                                    aria-describedby="basic-addon1">
                                            </div>
                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <input type="hidden" name="promoToken" value="{{$token}}">
                                            <button type="submit" class="btn btn-primary btn-block w-100">Ajouter</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--/col-lg-6 -->
                </div>
                <!--/row -->
            </div>
            <!--/card-box -->
        </div>
        <!--/card-holder -->
    </section>
@endsection
