@extends('layouts.PuppyLayout')
@section('content')
    <!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner editContent">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="{{route('index_page')}} " class="editContent">Home <span
                                class="fa fa-angle-right" aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active editContent">Contact</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="w3l-contact-info-main" id="contact">
        <div class="contact-sec	editContent">
            <div class="container">
                <div class="main-titles-head text-center">
                    <h3 class="header-name editContent">
                        Contact with us
                    </h3>
                    <p class="tiltle-para editContent editContent">One dog, two dogs, three dogs, so many dogs and We love
                        it.</p>
                </div>
                <div class="d-grid contact-view">
                    <div class="cont-details">
                        <div class="cont-top">
                            <div class="cont-left text-center">
                                <span class="fa fa-phone text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <p class="para"><a href="tel:+44 99 555 42">+123 45 67 89</a></p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-envelope-o text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <p class="para"><a href="mailto:example@mail.com"
                                        class="mail">patronapuppy@gmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="cont-top margin-up">
                            <div class="cont-left text-center">
                                <span class="fa fa-map-marker text-primary"></span>
                            </div>
                            <div class="cont-right">
                                <p class="para"> 6 D5 Street, Ward 25, Binh Thanh, City
                                    Ho Chi Minh City 72300</p>
                            </div>
                        </div>
                    </div>
                    <div class="map-iframe ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62705.74842121219!2d106.6613872901935!3d10.802941919953362!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529ed00409f09%3A0x11f7708a5c77d777!2zQXB0ZWNoIENvbXB1dGVyIEVkdWNhdGlvbiAtIEjhu4cgVGjhu5FuZyDEkMOgbyB04bqhbyBM4bqtcCBUcsOsbmggVmnDqm4gUXXhu5FjIHThur8gQXB0ZWNo!5e0!3m2!1svi!2s!4v1655283245617!5m2!1svi!2s"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>

                @if (session('status'))
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success ! </strong> &nbsp; {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <div class="login-form">
                            <form method="POST" action="{{ route('addContact') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-form-label text-md-right">{{ __('Full Name') }}</label>

                                            <input type="text"
                                                class="form-control @error('fullname') is-invalid @enderror" name="fullname"
                                                value="{{ isset(Auth::user()->firstname) ? Auth::user()->firstname : '' }} {{ isset(Auth::user()->lastname) ? Auth::user()->lastname : '' }}"
                                                required autocomplete="Fullname" autofocus>

                                            @error('fullname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="form-group">
                                            <label for="email"
                                                class="col-form-label text-md-right">{{ __('Email Address') }}</label>

                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email"
                                                value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}"
                                                required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="form-group">
                                            <label for="name"
                                                class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                            <input type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                name="phone_number"
                                                value="{{ isset(Auth::user()->phone_number) ? Auth::user()->phone_number : '' }}"
                                                required autocomplete="phone_number" autofocus>

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-form-label text-md-right">{{ __('Subject') }}</label>

                                            <input type="text"
                                                class="form-control @error('subject') is-invalid @enderror" name="subject"
                                                required autofocus>

                                            @error('subject')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">

                                            <label for="password"
                                                class="col-form-label text-md-right">{{ __('Message') }}</label>

                                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>

                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
    </section>
@endsection
