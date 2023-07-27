@extends('layouts.PuppyLayout')
@section('css')
@endsection
@section('content')
    <section class="w3l-inner-banner-main">
        <div class="about-inner editContent">
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li class="right-side propClone"><a href={{route('index_page')}}  class="editContent">Home <span
                                class="fa fa-angle-right" aria-hidden="true"></span></a>
                        <p>
                    </li>
                    <li class="active editContent">Library</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="container col-10">
        @if (count($Image) > 0)
            <div class="row">
                @foreach ($Image as $img)
                    <div class="col-4">
                        <img src="{{ asset('upload/images') }}/{{ $img->image_Name }}" alt=""
                            style="width: 450px; height: 350px" class="mt-5 mb-5" loading="lazy">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
       
    </script>
@endsection
