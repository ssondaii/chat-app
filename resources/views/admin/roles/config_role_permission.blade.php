@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/role/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('role.title_role_permission') }}
        </div>

        <div class="card-body">
<?php
    dd($roles->toArray());
?>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/role/drag_drop.js') }}"></script>
@endsection
