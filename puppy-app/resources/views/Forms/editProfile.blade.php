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
                    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                        href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">User profile</a>
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
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="../examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="../examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="../examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="../examples/profile.html" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
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
                        <div class="col-lg-7 col-md-9">
                            <h1 class="display-2 text-white">Hello {{ $userProfile[0]->user_Name }}</h1>
                            <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made
                                with your work and manage your projects or assigned tasks</p>
                            <a href="{{ route('userProfile') }}" class="btn btn-info">View Profile</a>
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
                                            <img src="{{ asset('images/profile') }}/{{ $userProfile[0]->user_Image }}"
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
                                </div>
                            </div>
                            <div class="card-body pt-0 pt-md-4">

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

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @error('msg')
                                    <div class="alert alert-danger alert-dismissible fade show container" role="alert">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span style="text-align: center;">{{ $message }}</span>
                                    </div>
                                @enderror
                                <form method="POST"enctype="multipart/form-data">
                                    @csrf
                                    <h6 class="heading-small text-muted mb-4">User information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label"
                                                        for="input-username">Username</label>
                                                    <input type="text" id="input-email" name="editName"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $userProfile[0]->user_Name }}">
                                                    @error('editName')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email
                                                        address</label>
                                                    <input type="email" id="input-email" name="editEmail"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $userProfile[0]->user_Email }}">
                                                    @error('editEmail')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Date of Birth
                                                    </label>
                                                    <input type="date" id="input-email" name="editDOB"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $userProfile[0]->user_DOB }}">
                                                    @error('editDOB')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Gender
                                                    </label>
                                                    <select class="form-control form-control-alternative" id=""
                                                        name="editGender" value="{{ $userProfile[0]->user_Gender }}">
                                                        <option>Male</option>
                                                        <option>FeMale</option>
                                                        <option>Other</option>
                                                    </select>
                                                    @error('editGender')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
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
                                                    <input type="text" id="input-email" name="editAddress"
                                                        class="form-control form-control-alternative"
                                                        value="{{ $userProfile[0]->user_Address }}">
                                                    @error('editAddress')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <h6 class="heading-small text-muted mb-4">Change Image</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group focused">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <label class="form-control-label"
                                                                for="input-username">Avatar</label>
                                                            <input type="file" class="custom-file-input"
                                                                id="inputGroupFile01" name="editAvatar">
                                                            <label class="custom-file-label" for="">Choose
                                                                file</label>
                                                        </div>
                                                    </div>
                                                    @error('editAvatar')
                                                        <p class="text-danger text-sm pl-lg-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Description -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ route('changePass') }}" class="btn btn-info">Change Password</a>
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
