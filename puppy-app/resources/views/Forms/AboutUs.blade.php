@extends('layouts/PuppyLayout')
@section('css')
@endsection

@section('content')
    <section class="w3l-inner-banner-main">
        <div class="about-inner editContent">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href="{{route('index_page')}} " class="editContent">Home <span
                                class="fa fa-angle-right" aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active editContent">About</li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container col-8">
        <section class="w3l-content-with-photo-4" id="about">
            <div class="content-with-photo4-block editContent">
                <div class="container">
                    <div class="cwp4-two-two row">
                        <div class="cwp4-image col-lg-6">
                            <img src="{{ asset('images/layout/8.jpg') }}" alt="product" class="img-responsive about-me">
                        </div>
                        <div class="cwp4-text col-lg-6 ">
                            <div class="posivtion-grid">
                                <h3 class="editContent"><span class="color-text"> Patrona Puppy </span></h3>
                                <p class="para editContent">Is a website which is actually encyclopedia about all
                                    types of dogs. The Famous Veteran Patrona is fond of animals specially Dogs, Cats,
                                    Rabbits.
                                </p>
                                <ul>
                                    <li><span class="fa fa-circle mr-2" aria-hidden="true"></span>With
                                        her achievements,she also had
                                        interest in writing books on animals and their behavior</li>
                                    <li><span class="fa fa-circle mr-2" aria-hidden="true"></span>All those years she had
                                        came
                                        across various type of breeds and their characteristics and behavior.</li>
                                    <li><span class="fa fa-circle mr-2" aria-hidden="true"></span>All those years she had
                                        came
                                        across various type of breeds and their characteristics and behavior.</li>
                                    <li><span class="fa fa-circle mr-2" aria-hidden="true"></span>The
                                        website show all the type of dogs
                                        found in which location, their behavior, characteristics</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="w3l-about ">
            <div class="skills-bars editContent text-center">
                <div class="container">
                    <img src="{{ asset('images/layout/5.jpg') }}" alt="product" class="img-responsive about-me">

                    <h3>Pet Grooming &amp; Care Center</h3>

                    <p class="para mt-md-4 mt-3">Consectetur adipisicing elit Lorem ipsum dolor, sit amet. Adipisci
                        voluptate dolore quis, deleniti error temporibus qui quaerat ea, tempora autem delectus eligendi
                        doloremque cumque! Aperiam eveniet eos ad dolorem fugit Lorem ipsum dolor, sit amet consectetur
                        adipisicing elit. Ad, ullam alias enim dolorem minus illum sit rem! Minus alias, sint nihil quas
                        culpa eveniet. Veniam, quae mollitia! Vel, voluptatibus magnam.</p>
                </div>
            </div>
        </section>

        <section class="w3l-recent-work">
            <div class="jst-two-col">
                <div class="container">
                    <div class="content-photo-1 row">
                        <div class="content-photo-left_sur col-lg-6">
                            <h3>If you Have Any <span class="color-text">Problem</span></h3>
                            <p class="para mt-3">When ever you need, we are here to help you choose a puppy with the very
                                best chance of a long and healthy life.We’ll show you how to keep your dog in great health
                                from puppy hood to old age, and how to make sensible decisions when it comes to safeguarding
                                his well-being.</p>
                            <a href="/contact" class="action-button btn mt-md-4 mt-3">Contact Us</a>
                        </div>
                        <div class="content-photo-right_sur col-lg-6">
                            <div class="csslider infinity" id="slider1">
                                <input type="radio" name="slides" checked="checked" id="slides_1">
                                <input type="radio" name="slides" id="slides_2">
                                <input type="radio" name="slides" id="slides_3">
                                <ul class="banner_slide_bg">
                                    <li>
                                        <img class="img" src="{{ asset('images/layout/c1.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img class="img" src="{{ asset('images/layout/c2.jpg') }}" alt="">
                                    </li>
                                    <li>
                                        <img class="img" src="{{ asset('images/layout/c3.jpg') }}" alt="">
                                    </li>

                                </ul>
                                <div class="arrows">
                                    <label for="slides_1"></label>
                                    <label for="slides_2"></label>
                                    <label for="slides_3"></label>
                                </div>
                                <div class="navigation">
                                    <div>
                                        <label for="slides_1"></label>
                                        <label for="slides_2"></label>
                                        <label for="slides_3"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
@endsection
