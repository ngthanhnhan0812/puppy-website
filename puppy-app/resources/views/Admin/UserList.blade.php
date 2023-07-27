@extends('layouts/AdminLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection
@section('content')
    <div class="container">
        <h2 class="title1">Manage User</h2>
        <div class="">
            @if ($messSuccess = Session::get('messSuccess'))
                <div class="alert alert-success show" role="alert">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong style="text-align: center;">{{ $messSuccess }}</strong>
                </div>
            @endif
            <div class="table-wrapper row mb-0">
                <a href="#deleteEmployeeModal" class="btn btn-success" data-toggle="modal" id="activeAllBtn"><span>Active
                        All</span></a>
                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal" id="disableAllBtn"><span>Disable
                        All</span></a>
                        <div class="has-search col-xs-4" style="margin-top: 1px">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" class="form-control rounded" placeholder="Search" id="searchUser">
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
                        <th>User Name</th>
                        <th>Address</th>
                        <th>Date Of Birth</th>
                        <th>Email</th>
                        <th style="width: 18%">Create At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($Users) > 0)
                        @foreach ($Users as $u)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" name="selectBox" value="{{ $u->user_ID }}">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td style="width: 13%">{{ $u->user_Name }}</td>
                                <td>{{ $u->user_Address }}</td>
                                <td>{{ $u->user_DOB }}</td>
                                <td>{{ $u->user_Email }}</td>
                                <td>{{ $u->user_create_at }}</td>
                                <td>
                                    @if ($u->user_activity == 1)
                                        <p class="text-success">Active</p>
                                    @else
                                        <p class="text-warning">Disable</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            There is no User
                        </div>
                    @endif
                </tbody>
            </table>
            <div class="clearfix">
                {{ $Users->links() }}
            </div>
        </div>
    </div>
    </div>
    <!-- Delete Modal HTML -->

@endsection

@section('script')
    <script></script>
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
                $('a#activeAllBtn').text('Active All');
            }
        }

        function toggledisableAllBtn() {
            if ($('input[name="selectBox"]:checked').length > 0) {
                $('a#disableAllBtn').text('Disable (' + $('input[name="selectBox"]:checked').length + ')');
            } else {
                $('a#disableAllBtn').text('Disable All');
            }
        }
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
                        url: "{{ route('ajActiveAll_user') }}",
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
                        url: "{{ route('ajDisableAll_user') }}",
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
    //AjaxSearch User:
    {{-- Ajax Search --}}
        $("#searchUser").keyup(function() {
            var vsearch = $("#searchUser").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                    type: "POST",
                    url: "{{ route('ajsearchUser') }}",
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
