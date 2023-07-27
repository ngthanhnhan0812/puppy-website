@extends('Clients.post_page')
@section('content_post')
    <div class="wrap__layout">
        {{-- @if(!empty($filter)){ --}}
        @foreach ($filter_post as $key => $val)
            <div class="card " style="width:350px; height:320px; margin-top:20px; col-3">
                <img class="card-img-top" src="{{ asset('public/upload/images/' . $val->images) }} " 
                    style="width:100%; height:210px">
                <div class="card-body">
                    <a href="{{route('read_post_page', ['post_id' =>$val->post_ID])}}">
                        <h4>{{ $val->post_name }} </h4>
                    </a>
                    <p class="card-text">{!! $val->describe_p !!} </p>
                    
                    {{-- <a href="#" class="btn btn-primary">See Profile</a> --}}
                </div>
            </div>
        @endforeach
        {{-- }@else
            <div style="margin-top:200px ">
                <h3 style="text-align: center; color: #000;">Temporarily no posts!</h3>
            </div>
        @endif --}}
    </div>

@endsection
