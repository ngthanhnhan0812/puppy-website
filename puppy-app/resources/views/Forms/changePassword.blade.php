@extends('layouts/PuppyLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <section class="login-block">
        <div class="container containerLogin">

            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">Reset Password</h2>

                    @error('msg')
                        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;">{{ $message }}</span>
                        </div>
                    @enderror
                    <form class="login-form" method="POST" action="{{ route('submit.resetpass') }}">
                        <input type="text" hidden value="{{ $token }}" name="token">
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                            <input type="email" class="form-control" placeholder="" name="resetEmail"
                                value="{{ old('resetEmail') }}">
                            @error('resetEmail')
                                <p class="labelError">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">New Password</label>
                            <input type="password" class="form-control" placeholder="" name="newPwd">
                            @error('newPwd')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="" name="confirmNewPwd">
                            @error('confirmNewPwd')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>

                        @csrf
                        <div class="form-check">
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
                                <img class="d-block img-fluid" src="{{ asset('images/Page/form4.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid"
                                    src="{{ asset('images/Page/form5.jpg') }}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{ asset('images/Page/form6.jpg') }}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                            nostrud exercitation</p>
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
