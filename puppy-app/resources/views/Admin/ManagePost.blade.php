@extends('layouts/AdminLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="table-responsive">
            @if ($messSuccess = Session::get('messSuccess'))
                <div class="alert alert-success show" role="alert">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong style="text-align: center;">{{ $messSuccess }}</strong>
                </div>
            @endif
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-xs-6 rounded">
                            <h2>Manage <b>Post</b></h2>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('createPuppyG') }}" class="btn btn-success" data-toggle="modal"><span>Add
                                    New Post</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"
                                id="deleteAllBtn"><span>Delete All</span></a>
                        </div>
                        <div class="form-group has-search col-xs-4">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control rounded" placeholder="Search" id="searchPost">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover viewRender">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll" name="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Create At</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($Post) > 0)
                        @foreach ($Post as $key => $p)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" name="selectBox" value="{{ $p->post_ID }}">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $p->post_Title }}</td>
                                <td>{{ $p->post_cate }}</td>
                                <td>{{ $p->post_create_at }}</td>
                                <td>
                                    <a href=""><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('editPostG', ['ID' => $p->post_ID]) }}" class="edit"
                                        data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></a>
                                    <a href="{{ route('deletePost', ['ID' => $p->post_ID]) }}" class="delete"
                                        data-toggle="modal" onclick="assetDelete()"><i class="material-icons"
                                            data-toggle="tooltip" title="Delete">&#xE872;</i></a>
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
                {{ $Post->links() }}
            </div>
        </div>
    </div>
    </div>


@endsection

@section('script')
    {{-- Ajax Search --}}
    <script>
        $("#searchPost").keyup(function() {
            var vsearch = $("#searchPost").val();
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

    {{-- Ajax Checked --}}
    <script>
        $(document).on('click', 'input[name="selectAll"]', function() {
            if (this.checked) {
                $('input[name="selectBox"]').each(function() {
                    this.checked = true;
                });
            } else {
                $('input[name="selectBox"]').each(function() {
                    this.checked = false;
                });
            }
            toggledeleteAllBtn();
        });

        $(document).on('change', 'input[name="selectBox"]', function() {

            if ($('input[name="selectBox"]').length == $('input[name="selectBox"]:checked').length) {
                $('input[name="selectAll"]').prop('checked', true);
            } else {
                $('input[name="selectAll"]').prop('checked', false);
            }
            toggledeleteAllBtn();
        });


        function toggledeleteAllBtn() {
            if ($('input[name="selectBox"]:checked').length > 0) {
                $('a#deleteAllBtn').text('Delete (' + $('input[name="selectBox"]:checked').length + ')');
            } else {
                $('a#deleteAllBtn').text('Delete All');
            }
        }

        $(document).on('click', 'a#deleteAllBtn', function() {
            var checkedPost = [];
            $('input[name="selectBox"]:checked').each(function() {
                checkedPost.push($(this).val());
            });
            if (checkedPost.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "Post",
                    url: "{{ route('ajdeletePost') }}",
                    data: {
                        valDelete:checkedPost
                    },
                })
                .done(function(data) {
                    location.reload();
                });
            } else {
                alert("Please Select At Least 1 Row");
            }
        });
    </script>
@endsection
