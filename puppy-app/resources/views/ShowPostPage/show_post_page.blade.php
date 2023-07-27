@extends('layouts/PuppyLayout')

@section('content')

    <div class="container">
        <div class="container-postPage ">
            <div class="row">
                <div class="col-3">
                    <aside>
                        <h3 style="border-bottom:2px solid red;">Filter Category</h3>
                        <hr>

                        <form action="" class="row">
                            <div class="col-9">
                                <input type="search" class="form-control" placeholder=" search" name="keywords">
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-success"
                                    value="{{ request()->keywords }}">Search</button>
                            </div>
                            @csrf
                        </form> <br>
                        <br>
                        <form action="{{route('search_post_page')}} " method="post" >
                            <div class="col-11">
                                <label>National </label>
                                <select name="pp_national" id="" class="form-control" >                           
                                    <option value="0">tat ca </option>
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_national_id }}">
                                            {{ $val->national }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                            <label>Dog name </label>
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_dog_name_id }} ">{{ $val->dog_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_national_id }} ">{{ $val->national }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_trainability_id }} ">{{ $val->trainability }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control" placeholder="enter">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_barking_lv_id }} ">{{ $val->barking_lv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_activity_id }} ">{{ $val->activity_lv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_breed_id }} ">{{ $val->dog_breed }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_characteristics_id }} ">{{ $val->characteristics }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_coat_type_id }} ">{{ $val->coat_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_shedding_id }} ">{{ $val->shedding }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-11">
                                <select name="" id="" class="form-control">
                                    @foreach ($all_data_post as $key => $val)
                                        <option value="{{ $val->p_size_id }} ">{{ $val->size }}</option>
                                    @endforeach
                                </select>
                            </div> <br>


                            <button style="margin-right: 10px" type="submit" class="btn btn-primary ">Submit</button>
                            @csrf
                        </form>



                    </aside>
                </div>
                <div class="col-9">
                    <main>
                        <h3 style="border-bottom:2px solid red;">Post Category</h3>
                        <hr>
                        <section class="w3l-covers-18">
                            <div class="covers-main editContent">
                                <div class="main-titles-head text-center">
                                    <h3 class="header-name editContent">
                                        Pet Gallery
                                    </h3>
                                    <p class="tiltle-para editContent editContent">Lorem ipsum dolor sit amet consectetur,
                                        adipisicing elit. Hic fuga sit illo modi aut aspernatur tempore laboriosam saepe
                                        dolores eveniet.</p>
                                </div>
                                <div class="container ">
                                    <div class="gallery-image">

                                        <div class="">
                                            <div class="col-4">
                                                @foreach ($all_data_post as $key => $val)
                                                    <div class="card " style="width:400px">
                                                        <img class="card-img-top"
                                                            src="{{ asset('public/upload/images/' . $val->images) }} "
                                                            alt="Card image" style="width:100%">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{ $val->post_name }} </h4>
                                                            <p class="card-text">{!! $val->describe_p !!} </p>
                                                            <a href=" " class="btn btn-primary">See Profile</a>
                                                        </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{--  --}}
                                        {{-- <div class="img-box">
                                            <a href="#page"> <img src="public/upload/images/22.jpg" alt="product"
                                                    class="img-responsive "></a>

                                            <div class="caption">
                                                <h6><a href="#page">White & grey dog</a></h6>
                                                <p class="para">Nostrum qui sapiente sit expedita, nulla deleniti earum
                                                    delectus incidunt libero.</p>
                                            </div>

                                        </div> --}}
                                        {{-- <div class="img-box">
                                            <a href="#page"> <img src="assets/images/8.jpg" alt="product"
                                                    class="img-responsive "></a>

                                            <div class="caption">
                                                <h6><a href="#page">Black & Brown dog</a></h6>
                                                <p class="para">Nostrum qui sapiente sit expedita, nulla deleniti earum
                                                    delectus incidunt libero.</p>
                                            </div>

                                        </div>
                                        <div class="img-box">
                                            <a href="#page"><img src="assets/images/9.jpg" alt="product"
                                                    class="img-responsive "></a>

                                            <div class="caption">
                                                <h6><a href="#page">Light Grey dog</a></h6>
                                                <p class="para">Nostrum qui sapiente sit expedita, nulla deleniti earum
                                                    delectus incidunt libero.</p>
                                            </div>

                                        </div>
                                        <div class="img-box">
                                            <a href="#page"><img src="assets/images/10.jpg" alt="product"
                                                    class="img-responsive "></a>

                                            <div class="caption">
                                                <h6><a href="#page">Dark Gray dog</a></h6>
                                                <p class="para">Nostrum qui sapiente sit expedita, nulla deleniti earum
                                                    delectus incidunt libero.</p>

                                            </div>
                                        </div>
                                        <div class="img-box">
                                            <a href="#page"><img src="assets/images/11.jpg" alt="product"
                                                    class="img-responsive "></a>

                                            <div class="caption">
                                                <h6><a href="#page">Adult Black dog</a></h6>
                                                <p class="para">Nostrum qui sapiente sit expedita, nulla deleniti earum
                                                    delectus incidunt libero.</p>
                                            </div>

                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </main>
                </div>


            </div>
        </div>
    @endsection
