<!DOCTYPE html>
<html>

<head>
    <meta name="_token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Promotion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css"> --}}
</head>

<body>
    <div class="container-fluid db-social">
        <div class="jumbotron jumbotron-fluid"></div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="widget head-profile has-shadow">
                        <div class="widget-body pb-0">
                            <div class="row d-flex align-items-center">
                                <div class="col-xl-4 col-md-4 d-flex justify-content-lg-start justify-content-md-start justify-content-center">
                                    <ul>
                                        <li>
                                            <div class="counter">{{$promotion->count()}}</div>
                                            <div class="heading">Totale Promotion</div>
                                        </li>
                                        <li>
                                            <div class="counter">{{$students->count()}}</div>
                                            <div class="heading">Totale Apprenants</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xl-4 col-md-4 d-flex justify-content-center">
                                    <div class="image-default">
                                        <img class="rounded-circle" src="{{asset('assets/img/jackson-so-_t-l5FFH8VA-unsplash.jpg')}}" alt="...">
                                    </div>
                                    <div class="infos">
                                        <h2>Gestion des promotions</h2>
                                        <div class="location">Morocco, Tanger, S.C.</div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-4 d-flex justify-content-lg-end justify-content-md-end justify-content-center">
                                    <div class="follow">
                                        <a class="btn btn-shadow" href="{{route('promotion.index')}}"><i class="la la-user-plus"></i>ACCUEILLE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="col py-3">
            <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
