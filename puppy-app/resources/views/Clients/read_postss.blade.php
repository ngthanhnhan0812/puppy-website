@extends('layouts.PuppyLayout')

@section('content')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
  

    <div class="wrap__c" style="margin-bottom: 100px">
        <section class="w3l-inner-banner-main">
            <div class="about-inner editContent">
                <div class="container">
                    <ul class="breadcrumbs-custom-path">
                        <li class="right-side propClone"><a href="index.html" class="editContent">Home <span
                                    class="fa fa-angle-right" aria-hidden="true"></span></a>
                            <p>
                        </li>
                        <li class="active editContent">Read Post</li>
                    </ul>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-2 wrap__layout" {{-- style="margin-left:-50px" --}}>

            </div>

            <div class="col-8 mt-5">
                <main>
                    <h3 style="border-bottom:2px solid red;">Post Read</h3>
                    @foreach ($data_post as $key => $val)
                        {!! $val->describe_p !!}
                        {!! $val->content !!}
                    @endforeach
                </main>
            </div>
            {{-- end content --}}

        </div>
    </div>
    <div class="container col-8" style="margin-bottom: 30px">
        <hr>
        <h4>Your Comment</h4>
        @if ($messSuccess = Session::get('messSuccess'))
            <div class="alert alert-success alert-dismissible fade show container" role="alert">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span style="text-align: center;">{{ $messSuccess }}</span>
            </div>
        @endif
        <form action="{{ route('insertComment') }}" method="POST">
            <div id="" class="" name="">
                <textarea name="user_Comment" id="" cols="30" rows="10"></textarea>
            </div>
            <input type="hidden" name="postID" id="" value="{{ $data_post[0]->post_ID }}">
            @csrf
            <button type="submit" class="btn btn-primary" style="margin-top: 30px">Submit</button>
        </form>
    </div>
       <script>
        CKEDITOR.replace('user_Comment', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
