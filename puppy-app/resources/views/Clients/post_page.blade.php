@extends('layouts.PuppyLayout')
@section('content')
<style>
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

    .fix__search {
        justify-content: space-around;
        display: flex;
        flex-wrap: wrap;
    }
</style>
<section class="w3l-inner-banner-main">
    <div class="about-inner editContent">
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li class="right-side propClone"><a href="{{route('index_page')}} " class="editContent">Home <span
                            class="fa fa-angle-right" aria-hidden="true"></span></a>
                    <p>
                </li>
                <li class="active editContent">Post Page</li>
            </ul>
        </div>
    </div>
</section>
<div class="wrap__c" style="margin-bottom: 100px">
    <div class="row">
        <div class="col-3 wrap__layout" {{-- style="margin-left:-50px" --}}>
            <aside>
                <h3 style="border-bottom:2px solid red;">Search post name:</h3>
                <hr>
                {{-- search --}}
                <form action="{{ route('search_post_page') }} " method="post" class="row">

                    <div class="fix__search">
                        <div class="col-9">
                            <input type="search" class="form-control" placeholder=" search" name="keywords">
                        </div>
                        <div class="col-3 ">
                            <button type="submit" class="btn btn-success" {{-- value=" {{ request()->keywords }} " --}}>Search</button>
                        </div>
                    </div>
                    @csrf
                </form> <br>
                {{-- end search --}}
                {{-- filter --}}
                <div>
                    <h3 style="border-bottom:2px solid #000;">Filter:</h3>
                </div> <br>

                <form action=" {{ route('filter_post_page') }}" method="post">
                    <div class="col-12">
                        <span>National:</span>
                        <select name="f_national" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_national_id }}">
                                    {{ $val->national }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Dog name:</span>
                        <select name="f_dog_name" id="" class="form-control">
                            <option> hhihi</option>
                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_dog_name_id }} ">{{ $val->dog_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Group:</span>
                        <select name="f_group" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_group_id }} ">{{ $val->group_p }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Trainability:</span>
                        <select name="f_trainability" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_trainability_id }} ">{{ $val->trainability }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Barking level:</span>
                        <select name="f_barking" id="" class="form-control" placeholder="enter">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_barking_lv_id }} ">{{ $val->barking_lv }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Activity level:</span>
                        <select name="f_activity" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_activity_id }} ">{{ $val->activity_lv }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Dog breed:</span>
                        <select name="f_breed" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_breed_id }} ">{{ $val->dog_breed }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Characteristics:</span>
                        <select name="f_characteristics" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_characteristics_id }} ">{{ $val->characteristics }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Coat Type:</span>
                        <select name="f_coat" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_coat_type_id }} ">{{ $val->coat_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Shedding:</span>
                        <select name="f_shedding" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_shedding_id }} ">{{ $val->shedding }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <span>Size:</span>
                        <select name="f_size" id="" class="form-control">
                            <option> hhihi</option>

                            @foreach ($all_data_post as $key => $val)
                                <option value="{{ $val->p_size_id }} ">{{ $val->size }}</option>
                            @endforeach
                        </select>
                    </div> <br>


                    <button style="margin-left: 65%" type="submit" class="btn btn-primary ">Filter</button>
                    @csrf
                </form>
                {{-- end filters! --}}
            </aside>
        </div>
        {{-- end sidebar --}}
        {{-- start content --}}
        <div class="col-9 ">
            <main>
                <h3 style="border-bottom:2px solid red;">ALL POST HERE:</h3>
                <hr>
                @yield('content_post')
            </main>
        </div>
        {{-- end content --}}
    </div>
</div>
@endsection
