@extends('layouts/AdminLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection
@section('content')
    <div class="container">
        <h2 class="title1">Approve Comments</h2>
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
                <div class="table-wrapper">
                    <a href="#deleteEmployeeModal" class="btn btn-success" data-toggle="modal"
                        id="activeAllBtn"><span>Active</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"
                        id="disableAllBtn"><span>Delete</span></a>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="selectAll" name="selectAll">
                                <label for="selectAll"></label>
                            </span>
                        </th>
                        <th>ID</th>
                        <th style="width: 15%">Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Create At</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($Comment) > 0)
                        @foreach ($Comment as $key => $c)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" name="selectBox" value="{{ $c->id }}">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $c->user_Name }}</td>
                                <td>{{ $c->user_Email }}</td>
                                <td>{!! $c->Comment !!}</td>
                                <td>{{ $c->create_at }}</td>
                                <td>

                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="" name="activeComment"
                                            value="{{ $c->id }}">
                                        <label for=""></label>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            There is no Comment Waiting
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
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
            toggleactiveAllBtn();
            toggledisableAllBtn();
        });

        $(document).on('change', 'input[name="selectBox"]', function() {

            if ($('input[name="selectBox"]').length == $('input[name="selectBox"]:checked').length) {
                $('input[name="selectAll"]').prop('checked', true);
            } else {
                $('input[name="selectAll"]').prop('checked', false);
            }
            toggleactiveAllBtn();
            toggledisableAllBtn();
        });


        function toggleactiveAllBtn() {
            if ($('input[name="selectBox"]:checked').length > 0) {
                $('a#activeAllBtn').text('Active (' + $('input[name="selectBox"]:checked').length + ')');
            } else {
                $('a#activeAllBtn').text('Active');
            }
        }

        function toggledisableAllBtn() {
            if ($('input[name="selectBox"]:checked').length > 0) {
                $('a#disableAllBtn').text('Disable (' + $('input[name="selectBox"]:checked').length + ')');
            } else {
                $('a#disableAllBtn').text('Disable');
            }
        }

        $(document).on('change', 'input[name="activeComment"]', function() {
            var vactive = $('input[name="activeComment"]:checked').val();
            if (vactive.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        type: "Post",
                        url: "{{ route('ajActiveComment') }}",
                        data: {
                            id: vactive
                        },
                    })
                    .done(function(data) {
                        location.reload();
                        alert(data);
                    });
            }
        });

        //Active
        $(document).on('click', 'a#activeAllBtn', function() {
            var checkedUser = [];
            $('input[name="selectBox"]:checked').each(function() {
                checkedUser.push($(this).val());
            });
            if (checkedUser.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        type: "Post",
                        url: "{{ route('ajACommentAll') }}",
                        data: {
                            valUser: checkedUser
                        },
                    })
                    .done(function(data) {
                        location.reload();
                        alert(data);
                    });
            } else {
                alert("Please Select At Least 1 Row");
            }
        });
        //Disable
        $(document).on('click', 'a#disableAllBtn', function() {
            var checkedUser = [];
            $('input[name="selectBox"]:checked').each(function() {
                checkedUser.push($(this).val());
            });
            if (checkedUser.length > 0) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        type: "Post",
                        url: "{{ route('ajDCommentAll') }}",
                        data: {
                            valUser: checkedUser
                        },
                    })
                    .done(function(data) {
                        location.reload();
                        alert(data);
                    });
            } else {
                alert("Please Select At Least 1 Row");
            }
        });
    </script>
@endsection
