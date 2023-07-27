@extends('layouts.AdminLayout')
@section('content')
    {{-- dog --}}
    <style>
        h1 {
            border-bottom: 2px solid #000;
        }

        .mydown {
            color: red;
            font-size: 1.5em;
        }

        .myup {
            color: rgb(56, 220, 62);
        }
    </style>

    {{-- @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}} </div>
            @endif --}}
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }} </div>
    @endif
    <h1>List Category</h1>
    <hr>

    <br>
    <a href="{{ route('add_post') }}  " class="btn btn-primary">Add Category</a>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">National</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_national as $key => $val)
                            <tr>
                                <td>{{ $val->national }} </td>
                                <td>
                                    <a href="{{ route('category.edit_national', ['nat_id' => $val->national_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_national', ['nat_id' => $val->national_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Breed:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_breed as $key => $val)
                            <tr>
                                <td>{{ $val->dog_breed }} </td>
                                <td>
                                    <a href="{{ route('category.edit_breed', ['bre_id' => $val->breed_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_breed', ['bre_id' => $val->breed_id]) }}"> <i
                                            class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Activity_level:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_activity as $key => $val)
                            <tr>
                                <td>{{ $val->activity_lv }} </td>
                                <td>
                                    <a href="{{ route('category.edit_activity_lv', ['act_id' => $val->activity_id]) }} ">
                                        <i class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_activity_lv', ['act_id' => $val->activity_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Barking_level:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_barking as $key => $val)
                            <tr>
                                <td>{{ $val->barking_lv }} </td>
                                <td>
                                    <a href="{{ route('category.edit_barking_lv', ['bar_id' => $val->barking_id]) }} ">
                                        <i class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?...before that, delete the post related to that category');"
                                        href="{{ route('category.delete_barking_lv', ['bar_id' => $val->barking_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- chia doi --}}
        <div class="row">
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Group:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_group as $key => $val)
                            <tr>
                                <td>{{ $val->group_p }} </td>
                                <td>
                                    <a href="{{ route('category.edit_group', ['gro_id' => $val->group_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_group', ['gro_id' => $val->group_id]) }}"> <i
                                            class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">characteristics:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_characteristics as $key => $val)
                            <tr>
                                <td>{{ $val->characteristics }} </td>
                                <td>
                                    <a
                                        href="{{ route('category.edit_characteristic', ['cha_id' => $val->characteristics_id]) }} ">
                                        <i class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_characteristic', ['cha_id' => $val->characteristics_id]) }} ">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">coat_type:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_coat as $key => $val)
                            <tr>
                                <td>{{ $val->coat_type }} </td>
                                <td>
                                    <a href="{{ route('category.edit_coat_type', ['coa_id' => $val->coat_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_coat_type', ['coa_id' => $val->coat_id]) }}"> <i
                                            class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Shedding:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_shedding as $key => $val)
                            <tr>
                                <td>{{ $val->shedding }} </td>
                                <td>
                                    <a href="{{ route('category.edit_shedding', ['she_id' => $val->shedding_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_shedding', ['she_id' => $val->shedding_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- chia doi --}}
        <div class="row">
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Size:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_size as $key => $val)
                            <tr>
                                <td>{{ $val->size }} </td>
                                <td>
                                    <a href="{{ route('category.edit_size', ['siz_id' => $val->size_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_size', ['siz_id' => $val->size_id]) }}"> <i
                                            class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Trainability:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_trainability as $key => $val)
                            <tr>
                                <td>{{ $val->trainability }} </td>
                                <td>
                                    <a
                                        href="{{ route('category.edit_trainability', ['tra_id' => $val->trainability_id]) }} ">
                                        <i class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_trainability', ['tra_id' => $val->trainability_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{--  --}}
            <div class="col-md-3">
                <table classs="table table-bodered ">
                    <thead>
                        <tr>
                            <th width="100px">Dogname:</th>
                            <th>D&U</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_cate_dog_name as $key => $val)
                            <tr>
                                <td>{{ $val->dog_name }} </td>
                                <td>
                                    <a href="{{ route('category.edit_dog_name', ['dog_id' => $val->dog_name_id]) }} "> <i
                                            class="fa fa-pencil-square-o text-success text-activite"> </i> </a>
                                    <a onclick="return confirm('Are you sure?');"
                                        href="{{ route('category.delete_dog_name', ['dog_id' => $val->dog_name_id]) }}">
                                        <i class="fa fa-times text-danger text"> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>



    </div>
    </div>
@endsection
