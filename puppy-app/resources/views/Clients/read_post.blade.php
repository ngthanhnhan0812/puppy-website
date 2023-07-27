@extends('layouts.PuppyLayout')
@section('content')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <style>
        .wrap__layout {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .wrap__c {
            margin: 0 auto;
            margin-left: 5%;
            margin-right: 5%;
        }
    </style>

    <div class="wrap__c" style="margin-bottom: 100px">
        <div class="row">
            <div class="col-2 " {{-- style="margin-left:-50px" --}}>

            </div>

            <div class="col-8 ">
                <main>
                    <h3 style="border-bottom:2px solid red;">Read post:</h3>
                    <h1>Post content:</h1> <br>
                    <hr>
                    <div>

                        @foreach ($data_post as $key => $val)
                            <h1 style="text-align: center">{{$val->post_name}} </h1>
                            <img class="card-img-top" src="{{ asset('public/upload/images/' .$val->images) }} "
                                style="width:100%; height:350px">
                        @endforeach
                    </div>
                    @foreach ($data_post as $key => $val)
                        {!! $val->describe_p !!}
                        {!! $val->content !!}
                    @endforeach
                </main>
            </div>
            {{-- end content --}}

        </div>
        <div class="col-2 ">

        </div>
    </div>
    <script>
        CKEDITOR.replace('user_Comment', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection