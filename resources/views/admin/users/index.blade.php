@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/user/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('user.title') }}
        </div>

        <div class="card-body">
            <button type="button"
                    class="btn btn-outline-success"
                    data-toggle="modal"
                    data-target="#modalCreateUser"
                    style="margin-bottom: 10px;">
                {{ trans('global.button.btn_create') }}
            </button>
            <div class="table-responsive text-align-center" style="padding: 10px">
                <table class=" table table-bordered table-hover datatable datatable-Client">
                    <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('user.fields.column1') }}</th>
                        <th class="col-2">{{ trans('user.fields.column2') }}</th>
                        <th class="col-3">{{ trans('user.fields.column3') }}</th>
                        <th class="col-4">{{ trans('user.fields.column4') }}</th>
                        <th class="col-2" colspan="2">{{ trans('user.fields.column5') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($users) && count($users)>0)
                        @foreach($users as $key => $user)
                            <tr class="row" data-entry-id="{{ $user->id }}">
                                <td class="col-1">{{ $user->id }}</td>
                                <td class="col-2">{{ $user->name ?? '' }}</td>
                                <td class="col-3">{{ $user->email ?? '' }}</td>
                                <td class="col-4">{{ $user->created_at ?? '' }}</td>
                                <td class="col-1">
                                    <button id="edit-[{{ $key }}]"
                                            class="btn btn-xs btn-info"
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-toggle="modal"
                                            data-target="#modalCreateUser"
                                    >{{ trans('global.button.btn_edit') }}</button>
                                </td>
                                <td class="col-1">
                                    <button id="delete-[{{ $key }}]"
                                            class="btn btn-xs btn-danger"
                                            data-id="{{ $user->id }}"
                                            data-name="{{ $user->name }}"
                                            data-email="{{ $user->email }}"
                                            data-toggle="modal"
                                            data-target="#modalDeleteUser"
                                    >{{ trans('global.button.btn_delete') }}</button>
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

    @include('admin/users/modal._modalCreateUser')
    @include('admin.users.modal._modalDeleteUser')
    @include('admin/modal._modalError')
    @include('admin/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/user/index.js') }}"></script>
    <script src="{{ asset('js/user/validationUser.js') }}"></script>
@endsection
