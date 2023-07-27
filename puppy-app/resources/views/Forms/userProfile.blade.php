@extends('layouts/PuppyLayout')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
@endsection

@section('content')

    <body>
        <div class="main-content">
            <!-- Top navbar -->
            <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
                <div class="container-fluid">
                    <!-- Brand -->
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="/" target="_blank">User
                        profile</a>
                    <!-- Form -->
                    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                        <div class="form-group mb-0">
                        </div>
                    </form>
                    <!-- User -->
                    <ul class="navbar-nav align-items-center d-none d-md-flex">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt=""
                                            src="{{ asset('images/profile') }}/{{ $userProfile[0]->user_Image }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span
                                            class="mb-0 text-sm  font-weight-bold">{{ $userProfile[0]->user_Name }}</span>
                                    </div>
                                </div>
                            </a>

                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Header -->
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" id="profileImage">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-7 col-md-10">
                            <h1 class="display-2 text-white">Hello {{ $userProfile[0]->user_Name }}</h1>
                            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made
                                with your work and manage your projects or assigned tasks</p>
                            <a href="{{ route('userEditProfile') }}" class="btn btn-info">Edit profile</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#">
                                            <img height=""
                                                src="{{ asset('images/profile') }}/{{ $userProfile[0]->user_Image }}"
                                                class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                <div class="d-flex justify-content-between">
                                    @if ($userProfile[0]->user_activity == 1)
                                        <a href="#" class="btn btn-sm btn-success mr-4">Enable</a>
                                    @else
                                        <a href="#" class="btn btn-sm btn-warning mr-4">Disable</a>
                                    @endif
                                    <a href="{{ route('logout') }}" class="btn btn-sm btn-danger mr-4">LogOut</a>
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h3>
                                        {{ $userProfile[0]->user_Name }}<span class="font-weight-light"></span>
                                    </h3>
                                    <div class="h5 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>Welcome to Patrona Puppy
                                    </div>
                                    <div>
                                        <i class="ni education_hat mr-2"></i>We hope you have a nice day
                                    </div>
                                    <hr class="my-4">
                                    <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes,
                                        performs and records all of his own music.</p>
                                    <a href="#">Patrona Puppy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow">
                            <div class="card-header bg-white border-0">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">My account</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($messSuccess = Session::get('Success'))
                                    <div class="alert alert-success alert-dismissible fade show container" role="alert">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span style="text-align: center;">{{ $messSuccess }}</span>
                                    </div>
                                @endif
                                <form>
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-username">Username</label>
                                                    <p class="form-control form-control-alternative profile">
                                                        {{ $userProfile[0]->user_Name }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email
                                                        address</label>
                                                    <p class="form-control form-control-alternative profile">
                                                        {{ $userProfile[0]->user_Email }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Date of Birth
                                                    </label>
                                                    <p class="form-control form-control-alternative profile">
                                                        {{ $userProfile[0]->user_DOB }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Gender
                                                    </label>
                                                    <p class="form-control form-control-alternative profile">
                                                        {{ $userProfile[0]->user_Gender }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" for="input-address">Address</label>
                                                    <p class="form-control form-control-alternative profile">
                                                        {{ $userProfile[0]->user_Address }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <!-- Description -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6 m-auto text-center">
                    <div class="copyright">
                        <p>Made with <a href="/" target="_blank">Argon Dashboard</a> by Patrona Puppy</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
@endsection

@section('script')
@endsection
