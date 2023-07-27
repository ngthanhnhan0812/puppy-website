@extends('layouts/PuppyLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/forgetpassword.css') }}">
@endsection

@section('content')

    <body class="auth_class">

        <div class="container login-container">
            <img class="triangleA" src="{{ asset('images/istockphoto-1081601244-612x612.jpg') }}" alt='Onestop triangle'>
            <div class="row">
                <div class="col-md-6 welcome_auth">
                    <div class="auth_welcome">
                        The Patrona puppy website is a website which is actually encyclopedia about all
                        types of pets.
                    </div>
                </div>
                <div class="col-md-6 login-form">
                    <div class="login_form_in">
                        <div class="auth_branding">
                            <a class="auth_branding_in" href="/"><span class="fa fa-paw mr-2" aria-hidden="true">
                                    Patrona Puppy</a>
                        </div>
                        <h1 class="auth_title text-left">Password Reset</h1>
                        @if ($messError = Session::get('Errors'))
                            <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span style="text-align: center;">{{ $messError }}</span>
                            </div>
                        @endif
                        @if ($messSuccess = Session::get('Success'))
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
                        <form method="POST">
                            <div class="alert alert-success bg-soft-primary border-0" role="alert">
                                Enter your email address and we'll send you an email with instructions to reset your
                                password.
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailReset" placeholder="Email Address" value="{{old("emailReset")}}"
                                    required>
                                @error('emailReset')
                                    <p class="labelError">{{ $message }}</p>
                                @enderror
                            </div>
                            @csrf
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Reset Password</button>
                            </div>
                            <div class="form-group other_auth_links">
                                <a class="text-primary" href="/login">Login</a>
                                <a class="text-primary" href="/register">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <img class="triangleB" src="https://res.cloudinary.com/procraftstudio/image/upload/v1613965232/triangleB_isffjy.png"
            alt='Onestop triangle'>
    </body>
@endsection

@section('script')
@endsection
