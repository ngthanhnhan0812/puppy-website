@extends('layouts.PuppyLayout')
@section('content')
{{-- <link rel="stylesheet" href="{{ asset('assets/css/style-starter.css') }} "> --}}
<style>
    .wrap {
        background-Color: rgb(155, 207, 190);
        height: 800px;
        width: 80%;
        margin: 0 auto;
    }

    .wrap__layout {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        flex-direction: row;
    }

    .wrap__c {
        margin: 0 auto;
        margin-left: 20px;
    }
</style>
{{-- <div class=" container"> --}}
    <div>
        <section class="w3l-hero-headers-9">
            <div class="slide header11" data-selector="header11">
                <div class="container">
                    <div class="banner-text ">
                        <h5 class=" ">Wellcome to Puppy Patronal
                            <br><strong>Special Care</strong>
                        </h5>
                        <p class=" ">Puppy patronal la noi chia sẻ những câu chuyện, những bức ảnh, những điểm cute về loài chó</p>
                        <a href="/contact" class="btn logo-button top-margin">Contact Us</a>
                    </div>
                </div>

            </div>
        </section>
    </div>
    {{--  --}}
    <div class="wrap__layout">
        @foreach ($post_index as $key => $val)
            <div class="card " style="width:350px; height:320px; margin-top:20px; col-3">
                <img class="card-img-top" src="{{ asset('upload/images/' . $val->images) }} " alt="Card image"
                    style="width:100%; height:210px">
                <div class="card-body">
                    <a href="{{-- {{route('read_post', ['post_id' =>$val->post_ID])}} --}}">
                        <h4 class="card-title">{{ $val->post_name }} </h4>
                    </a>
                    <p class="card-text">{!! $val->describe_p !!} </p>
                    {{-- <a href="#" class="btn btn-primary">See Profile</a> --}}
                </div>
            </div>
        @endforeach
    </div>
 {{--  --}}
 <section class="w3l-specification-6">
    <div class="specification-layout editContent">
        <div class="container">
            <div class=" row">
                <div class="my-bio col-lg-6">
                    <h3 class="title-big">Offering a <span class="color-text editContent">full-service </span>facility for pets</h3>
                    <div class="hair-make">
                        <h5><a href="#page">An vao day de xem thu vien anh</a></h5>
                        <p class="para mt-2">Volupt atibus minus libero perspi ciatis tempora fugiat labore rem id exercit ationem, optio sit facilis architecto possimus</p>
                    </div>
                    <div class="hair-make">
                        <h5><a href="{{route('register')}} ">Đăng kí tài khoản:</a></h5>
                        <p class="para mt-2">Nếu bạn thật sự yêu thích về loài chó, hãy đăng kí tài khoản chúng tôi sẽ gửi cho bạn những bài viết mới nhất</p>
                    </div>
                    <div class="hair-make">
                        <h5><a href="#page">Bạn có bài viết muốn chia sẻ với tôi& mọi người:</a></h5>
                        <p class="para mt-2">Hãy ấn vào đây, sẽ có phần cho bạn thỏa sức chia sẻ về loài chó</p>
                    </div>
                </div>
                <div class="col-lg-6 position-relative back-image">
                    <img src="{{asset('images/Page/userprofile.jpg')}}" alt="product" class="img-responsive ">
                </div>
        </div>
  </section>
@endsection
