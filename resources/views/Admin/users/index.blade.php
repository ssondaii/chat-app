@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/user/index.css') }}" rel="stylesheet">
@endsection
@section('content')
@if(session('status'))
    <input type="hidden" id="status_flg" value="{{ session('status') }}">
@endif
<div class="card">
    <div class="card-header">
        {{ trans('user.title_singular') }}
    </div>

    <div class="card-body">
        <button type="button"
                class="btn btn-outline-success"
                data-toggle="modal"
                data-target="#modalCreateNewOAuthClient"
                style="margin-bottom: 10px;">
            {{ trans('user.button.btn-create') }} {{ trans('user.title') }}
        </button>
        <div class="table-responsive" style="padding: 20px">
            <table class=" table table-bordered table-hover datatable datatable-Client">
                <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('user.fields.id') }}</th>
                        <th class="col-2">{{ trans('user.fields.name') }}</th>
                        <th class="col-3">{{ trans('user.fields.email') }}</th>
                        <th class="col-2">{{ trans('user.fields.created_at') }}</th>
                        <th class="col-2">{{ trans('user.fields.updated_at') }}</th>
                        <th class="col-2" colspan="2">{{ trans('user.fields.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                @if(isset($users) && count($users)>0)
                    @foreach($users as $key => $user)
                        <tr class="row" data-entry-id="{{ $user->id }}">
                            <td class="col-1">{{ ($key + 1) ?? '' }}</td>
                            <td class="col-2">{{ $user->name ?? '' }}</td>
                            <td class="col-3">{{ $user->email ?? '' }}</td>
                            <td class="col-2">{{ $user->created_at ?? '' }}</td>
                            <td class="col-2">{{ $user->updated_at ?? '' }}</td>
                            <td class="col-1">
                                <button id="edit-[{{ $key }}]"
                                        class="btn btn-sm btn-info"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-url="{{ $user->email }}"
                                        data-toggle="modal"
                                        data-target="#modalEditOAuthClient"
                                >{{ trans('user.button.btn-edit') }}</button>
                            </td>
                            <td class="col-1">
                                <button id="delete-[{{ $key }}]"
                                        class="btn btn-sm btn-danger"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-url="{{ $user->email }}"
                                        data-toggle="modal"
                                        data-target="#modalConfirmDelete"
                                >{{ trans('user.button.btn-delete') }}</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @if(isset($users) && count($users) > 0 && $users instanceof \Illuminate\Pagination\LengthAwarePaginator )
        <div class="pagination-sm">
            {{ $users->links() }}
        </div>
    @endif
</div>

@include('admin/users/modal._modalCreateClient')
@include('admin/users/modal._modalEditClient')
@include('admin/users/modal._modalConfirmDeleteClient')
@include('admin/users/modal._modalError')
@include('admin/users/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/user/index.js') }}"></script>
    <script src="{{ asset('js/user/validation.js') }}"></script>
@endsection
