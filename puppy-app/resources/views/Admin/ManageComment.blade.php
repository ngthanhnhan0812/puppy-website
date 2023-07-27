@extends('layouts/AdminLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection
@section('content')
    <div class="container">
        <h2 class="title1">Manage Comments</h2>
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
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th style="width: 15%">Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($Comment) > 0)
                        @foreach ($Comment as $key => $c)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $c->user_Name }}</td>
                                <td>{{ $c->user_Email }}</td>
                                <td>{!! $c->Comment !!}</td>
                                <td>{{ $c->create_at }}</td>
                                <td>
                                    <a href="{{ route('delete_comment', ['ID' => $c->id]) }}" class="delete"
                                        data-toggle="modal" onclick="assetDelete()"><i class="material-icons"
                                            data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            There is no Comment
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
@endsection
