@extends('layouts/PuppyLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <section class="login-block">
        <div class="container containerLogin">
            <div class="row">
                <div class="col-md-5 login-sec">
                    <h2 class="text-center">Sign Up</h2>
                    @if ($messError = Session::get('messError'))
                        <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span style="text-align: center;">{{ $messError }}</span>
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
                            <label for="exampleInputEmail1" class="text-uppercase">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="regiName"
                                value="{{ old('regiName') }}">
                            @error('regiName')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="regiAddress"
                                value="{{ old('regiAddress') }}">
                            @error('regiAddress')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Date of Birth</label>
                            <input type="date" class="form-control" placeholder="" name="regiDOB"
                                value="{{ old('regiDOB') }}">
                            @error('regiDOB')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gender</label>
                            <select class="form-control" id="" name="regiGender" value="{{ old('regiGender') }}">
                                <option>Male</option>
                                <option>FeMale</option>
                                <option>Other</option>
                            </select>
                            @error('regiGender')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="regiEmail"
                                value="{{ old('regiEmail') }}">
                            @error('regiEmail')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Password</label>
                            <input type="password" class="form-control" placeholder="" name="regiPwd"
                                value="{{ old('regiPwd') }}">
                            @error('regiPwd')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="text-uppercase">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="" name="regiConfirmPwd">
                            @error('regiConfirmPwd')
                                <p class="labelError">{{ $message }}</p>
                            @enderror
                        </div>
                        @csrf
                        <div class="form-check">

                            <button type="submit" class="btn btn-login float-right">Submit</button>
                        </div>
                    </form>
                    <div class="copy-text">Already Have Account <a href="{{ route('login') }}">Login</a> Now</div>
                </div>
                <div class="col-md-7 banner-sec">

                    <div class="carousel-caption d-none d-md-block">
                        {{-- <div class="banner-text">
                            <h2>This is Heaven</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation</p>
                        </div> --}}
                    </div>

                </div>
            </div>
        </div>
    </section>
   
@endsection

@section('script')
@endsection
