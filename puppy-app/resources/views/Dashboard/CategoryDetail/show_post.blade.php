@extends('layouts.AdminLayout')
@section('content')
    <a href="{{ route('add_post') }}  " class="btn btn-primary">Create post</a>

    @if ($messSuccess = Session::get('msg'))
        <div class="alert alert-success show" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong style="text-align: center;">{{ $messSuccess }}</strong>
        </div>
    @endif
    <div class="form-group has-search col-xs-4">
        <span class=" form-control-feedback"></span>
        <input type="text" class="form-control rounded" placeholder="Search" id="searchPost">
    </div>
    <table class="table table-bodered viewRender">
        <thead>
            <tr>
                <th>ID:</th>
                <th>Post Name:</th>
                <th>Images:</th>
                <th>Describe:</th>
                <th>Status:</th>
                <th>Create_at:</th>
                <th>D&U</th>
            </tr>
        </thead>
        <tbody class="">
            @if (count($cate_posts) > 0)
                @foreach ($cate_posts as $key => $val)
                    <tr>
                        <td>{{ $key + 1 }} </td>
                        <td>{{ $val->post_name }}</td>
                        <td><img src="/upload/images/{{ $val->images }}" style="width:100px; height:100px;"></td>
                        <td hieght="200px" width="400px">{!! $val->describe_p !!} </td>
                        {{-- <td hieght="100px" width="400px">{{ $val->content }} </td> --}}

                        {{-- 0:on 
                    -- 1:off --}}
                        <td>
                            <?php
                        if($val->post_status == 0){
                        ?>
                            <a href="{{ route('unactive_post', ['pos_id' => $val->post_ID]) }} "><span
                                    style="color:rgb(28, 212, 44);font-size:2.3em;"
                                    class="fa-thumbs-styling fa fa-thumbs-up"></span></a>
                            <?php
                        }else{
                        ?>
                            <a href="{{ route('active_post', ['pos_id' => $val->post_ID]) }} "><span
                                    style="color:red;font-size:2.3em;"class="fa-thumbs-styling fa fa-thumbs-down"></span></a>
                            <?php
                        } ?>
                        </td>
                        <td>{{ $val->create_at }} </td>
                        <td>
                            <a href="{{ route('edit_post', ['post_id' => $val->post_ID]) }}"> <i
                                    class="fa fa-pencil-square-o text-success text-activite"> </i>
                            </a>
                            <a onclick="return confirm('Are you sure?');"
                                href="{{ route('delete_post', ['post_id' => $val->post_ID]) }}"> <i
                                    class="fa fa-times text-danger text"> </i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="alert alert-warning" role="alert">
                    There is no Post
                </div>
            @endif
        </tbody>
    </table>
    <div class="clearfix">
        {{ $cate_posts->links() }}
    </div>
@endsection
@section('script')
    {{-- Ajax Search --}}
    <script>
        $("#searchPost").keyup(function() {
            var vsearch = $("#searchPost").val();
            console.log(vsearch);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    type: "POST",
                    url: "{{ route('ajsearchPost') }}",
                    data: {
                        vsearch: vsearch
                    },
                })
                .done(function(data) {
                    $('.viewRender').html(data);
                })
        });
    </script>
@endsection
