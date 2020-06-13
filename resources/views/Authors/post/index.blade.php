@extends('Authors.layouts.app')
@section('title', 'Post Management')

@section('meta')
<meta name="content" content="post">
<meta name="parameter" content="{{ route('post.index') }}">
@endsection

@section('style')
<script src="{{ asset('admin/assets/js/tinymce/js/tinymce/tinymce.min.js') }}"></script>
@endsection

@section('content')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="mg-b-0">Datatable</h6>
        <div class="d-flex tx-18">
            <a href="javascript:void(0)" id="refresh-datatable" class="link-03 lh-0 text-secondary">
                <i data-feather="refresh-cw"></i>
            </a>
            <a href="javascript:void(0)" id="store-modal" class="link-03 lh-0 mg-l-10 text-primary">
                <i data-feather="plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="datatable" class="table table-dashboard mg-b-0 w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@include('Authors.post._modal')

@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('admin/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/datatable.js') }}"></script>
@endsection
