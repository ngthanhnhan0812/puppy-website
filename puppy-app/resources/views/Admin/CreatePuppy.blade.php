@extends('layouts/AdminLayout')
@section('css')
@endsection

@section('content')
    <h2 class="title1">Create Puppy Post</h2>
    @if ($messSuccess = Session::get('messSuccess'))
        <div class="alert alert-success show" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong style="text-align: center;">{{ $messSuccess }}</strong>
        </div>
    @endif
    @if ($messError = Session::get('messError'))
        <div class="alert alert-danger show" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <span style="text-align: center;">{{ $messError }}</span>
        </div>
    @endif
    <div class="form-three widget-shadow">
        <form class="form-horizontal" method="POST" action="{{ route('createPuppyP') }}">
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="Title" name="postTitle">
                </div>
                <div class="col-sm-2">
                    <p class="help-block">Title of Post</p>
                </div>
            </div>
            <div class="form-group">
                <label for="focusedinput" class="col-sm-2 control-label">CateGory</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control1" id="focusedinput" placeholder="Category" name="postCate">
                </div>
            </div>
            <div class="form-group">
                <label for="disabledinput" class="col-sm-2 control-label">Post Description</label>
                <div class="col-sm-8">
                    <textarea name="postDesc"></textarea>
                </div>
            </div>
            @csrf
            <div class="form-group">
                <div class="col-ms-6 container">
                    <button type="submit" class="btn btn-default btn-hover container">Create Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('postDesc', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
