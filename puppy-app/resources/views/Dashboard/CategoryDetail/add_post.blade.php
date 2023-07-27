@extends('layouts.AdminLayout')
@section('content')
    <form action="{{ route('save_post') }} " method="post" enctype="multipart/form-data">
        <h3 style="color:rgb(207, 28, 28); border-bottom:1px solid #000;">Create Posts </h3> <br>
        @if ($messSuccess = Session::get('msg'))
            <div class="alert alert-success show" role="alert">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong style="text-align: center;">{{ $messSuccess }}</strong>
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <label for="">Dog Name:</label>
                <select name="dog_name" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_dog_name'] as $key => $val)
                        <option value="{{ $val->dog_name_id }}">{{ $val->dog_name }} </option>
                    @endforeach
                </select>

                <label for="">National:</label>
                <select name="p_national" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_national'] as $key => $val)
                        <option value="{{ $val->national_id }}">{{ $val->national }} </option>
                    @endforeach
                </select>

                <label for="">Trainability:</label>
                <select name="p_trainability" class="form-control input-sm m-botbot15 ">
                    @foreach ($data['cate_trainability'] as $key => $val)
                        <option value="{{ $val->trainability_id }}">{{ $val->trainability }} </option>
                    @endforeach
                </select>
                <label for="">Barking_level:</label>
                <select name="p_barking" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_barking'] as $key => $val)
                        <option value="{{ $val->barking_id }}">{{ $val->barking_lv }} </option>
                    @endforeach
                </select>

                <label for="">Group:</label>
                <select name="p_group" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_group'] as $key => $val)
                        <option value="{{ $val->group_id }}">{{ $val->group_p }} </option>
                    @endforeach
                </select>

                <label for="">Activity_level:</label>
                <select name="p_activity" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_activity'] as $key => $val)
                        <option value="{{ $val->activity_id }}">{{ $val->activity_lv }} </option>
                    @endforeach
                </select>
            </div>


            {{-- chia doi --}}
            <div class="col-md-6">

                <label for="">Breed:</label>
                <select name="p_breed" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_breed'] as $key => $val)
                        <option value="{{ $val->breed_id }}">{{ $val->dog_breed }} </option>
                    @endforeach
                </select>

                <label for="">Characteristics:</label>
                <select name="p_characteristics" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_characteristics'] as $key => $val)
                        <option value="{{ $val->characteristics_id }}">{{ $val->characteristics }} </option>
                    @endforeach
                </select>

                <label for="">Shedding:</label>
                <select name="p_shedding" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_shedding'] as $key => $val)
                        <option value="{{ $val->shedding_id }}">{{ $val->shedding }} </option>
                    @endforeach
                </select>

                <label for="">Coat:</label>
                <select name="p_coat" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_coat'] as $key => $val)
                        <option value="{{ $val->coat_id }}">{{ $val->coat_type }} </option>
                    @endforeach
                </select>

                <label for="">Size:</label>
                <select name="p_size" class="form-control input-sm m-bot15 ">
                    @foreach ($data['cate_size'] as $key => $val)
                        <option value="{{ $val->size_id }}">{{ $val->size }} </option>
                    @endforeach
                </select> <br>
            </div>
        </div>
        {{-- end! --}}
        <div class="form-group">
            <label for="exampleInputEmail1">Describe</label>
            <input type="text" class="form-control" name="describe">
          </div>
        <label for="">Content:</label>
        <textarea class="ckeditor" id="editor" cols="50" rows="10" name="content"></textarea> <br>
        <label for="">Add picture:</label>
        <input type="file" placeholder="choose file" class="form-control" name="images"> <br>
        <label for="">Post_name:</label> <br>
        <input type="text" name="post_name" placeholder="enter post name"> <br>
        <label for="">Meta keyword: </label>
        <textarea style="reszize:none" name="p_meta_keywords" class="form-control"id="" rows="5" placeholder="keywords ...The feature is not complete, please do not enter!"></textarea>
        <label for="">Meta desc: </label>
        <textarea style="reszize:none" name="p_meta_desc" class="form-control"id="" rows="4" placeholder="desc... The feature is not complete, please do not enter!"></textarea>
        <input type="datetime-local" placeholder="enter create_at" class="form-control " name="create_at" style="width:30%">
        <br>



        <button type="submit" class="btn btn-primary">Create Post</button>
        <a href="{{ route('show_post') }} " class="btn btn-warning">Back</a>

        @csrf
    </form>

    {{-- Jquery Ckeditor4 --}}
@endsection
@section('script')
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection
