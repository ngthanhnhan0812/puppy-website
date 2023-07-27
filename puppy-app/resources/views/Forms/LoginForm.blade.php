@extends('layouts/PuppyLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <section class="login-block">
        <div class="container containerLogin">

            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Login Now</h2>
                    @if ($messError = Session::get('messError'))
                        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;">{{ $messError }}</span>
                        </div>
                    @endif
                    @if (Session::get('disableAccount'))
                        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;"><small>Your Account have been disable,Please <a href="/contact">Contact</a> us to get
                                    more information</small></span>
                        </div>
                    @endif
                    @if ($messSuccess = Session::get('messSuccess'))
                        <div class="alert alert-success alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;">{{ $messSuccess }}</span>
                        </div>
                    @endif
                    @error('msg')
                        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;">{{ $message }}</span>
                        </div>
                    @enderror
                    <form class="login-form" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                            <input type="email" class="form-control" placeholder="" name="loginEmail"
                                value="{{ old('loginEmail') }}">
                            @error('loginEmail')
                                <p class="labelError">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" placeholder="" name="loginPwd">
                            @error('loginPwd')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>

                        @csrf
                        <div class="form-check">
                            <label class="form-check-label">
                                <a href="{{ route('forget_password') }} " class="forget"><small>Forget
                                        Your Password ?</small></a>
                            </label>
                            <button type="submit" class="btn btn-login float-right">Submit</button>
                        </div>

                    </form>
                    <div class="copy-text">Don't Have An Account ? <a href="{{ route('register') }}">Register</a> Now
                    </div>
                </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset('images/Page/form1.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Welcome to Patrona Puppy</h2>
                                        <p>Patrona Puppy is a huge collection of animals about all types of dogs, which is
                                            provided knowledge information about dogs and other animals</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('images/Page/form2.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Welcome to Patrona Puppy</h2>
                                        <p>Patrona Puppy is a huge collection of animals about all types of dogs, which is
                                            provided knowledge information about dogs and other animals</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('images/Page/sheep.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>Welcome to Patrona Puppy</h2>
                                        <p>Patrona Puppy is a huge collection of animals about all types of dogs, which is
                                            provided knowledge information about dogs and other animals</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection

@section('script')
@endsection
