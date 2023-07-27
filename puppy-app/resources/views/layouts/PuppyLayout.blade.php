<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Patrona Puppy Web</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style-starter.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="https://kit.fontawesome.com/99a0617376.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('images/layout/dog.png') }}" type="image/x-icon">
    @yield('css')
</head>

<body id="home">
    <section class=" w3l-header-4 header-sticky">
        <header class="absolute-top">

            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h1><a class="navbar-brand" href="{{route('index_page')}}"><span class="fa fa-paw mr-2"
                                aria-hidden="true"></span>
                            Patrona Puppy
                        </a></h1>
                    <button class="navbar-toggler bg-gradient collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="fa icon-expand fa-bars"></span>
                        <span class="fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index_page')}} ">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('post_page_form')}} ">Posts Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/image-library">Libary</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if (!Cookie::get('Admin') && !Session::get('User'))
                                        <a class="nav-link" href="/login">Login <i
                                                class="fa-solid fa-arrow-right-to-bracket"></i></a>
                                    @endif
                                    @if (!Cookie::get('Admin') && !Session::get('User'))
                                        <a class="nav-link " href="/register">Register <i
                                                class="fa-solid fa-dog"></i></a>
                                    @endif
                                    @if (Session::get('User'))
                                        <a class="nav-link " href="/user/profile">User Profile <i class="fa-solid fa-pen-circle"></i></a>
                                    @endif
                                    @if (Cookie::get('Admin'))
                                        <a class="nav-link " href="/admin/dashboard">Manage <i
                                                class="fa-solid fa-dog"></i></a>
                                    @endif
                                    @if (Cookie::get('Admin') || Session::get('User'))
                                        <a class="nav-link " href="/logout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
            </div>

            </nav>
            </div>
        </header>
    </section>

    @yield('content')
    <section class="w3l-footer-29-main">
        <div class="footer-29 py-5">
            <div class="container py-lg-4">
                <div class="row footer-top-29">
                    <div class="col-lg-5 col-md-6 col-sm-12 footer-list-29 footer-1 mt-5">
                        <h2><a href="index.html" class=""><span class="fa fa-paw mr-2" aria-hidden="true"></span>
                                Patrona Puppy</a></h2>
                        <p>Is a website which is actually encyclopedia about all types of dogs. The Famous Veteran
                            Patrona is fond of animals specially Dogs, Cats, Rabbits.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-5 footer-list-29 footer-3 mt-5">
                        <h6 class="footer-title-29">Get in Touch</h6>

                        <div class="column2">
                            <div class="href1"><span>E-mail:</span><a
                                    href="mailto:patronapuppy@gmail.com">patronapup@gmail.com</a>
                            </div>
                            <div class="href2"><span>Phone:</span><a href="tel:+(12)-00 222 00008">+(12)-00 222
                                    00008</a>
                            </div>
                            <div>
                                <p class="contact-para">6 D5 Street, Ward 25, Binh Thanh, City Ho Chi Minh City </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-5">
                        <h6 class="footer-title-29">Help </h6>
                        <div class="column2">
                            <div class="href1"><span>Have a Problem</span><a href="/contact">Contact</a>
                            </div>
                            <div class="href2"><span>See more information</span><a href="/login">Login</a>
                            </div>
                        </div>
                    </div>
                    </p>


                </div>
            </div>

        </div>
        </div>
        <div class="bottom-copies text-center">
            <div class="container">
                <p class="copy-footer-29">© 2022 Patrona Puppy. </p>
            </div>
        </div>
    </section>


    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-eject"></span>
    </button>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> <!-- Common jquery plugin -->
    <!--bootstrap working-->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- //bootstrap working-->
    <!-- disable body scroll which navbar is in active -->

    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->
    <!-- Btn Close Alert -->
    <script>
        $('.close').click(function() {
            $(this).parent().remove();
        });
    </script>
    @yield('script')
</body>

</html>
