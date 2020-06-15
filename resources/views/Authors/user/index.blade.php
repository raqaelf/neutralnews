@extends('Authors.layouts.app')
@section('title', 'User Management')

@section('meta')
<meta name="content" content="user">
<meta name="parameter" content="{{ route('user.index') }}">
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="mg-b-0">Datatable</h6>
    </div>
    <div class="card-body table-responsive">
        <table id="datatable" class="table table-dashboard mg-b-0 w-100">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('Authors.user._modal')

@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/datatable.js') }}"></script>
@endsection
