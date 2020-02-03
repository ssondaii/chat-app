@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/permission/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('permission.title') }}
        </div>

        <div class="card-body">
            <button type="button"
                    class="btn btn-outline-success"
                    data-toggle="modal"
                    data-target="#modalCreatePermission"
                    style="margin-bottom: 10px;">
                {{ trans('global.button.btn_create') }}
            </button>
            <div class="table-responsive text-align-center" style="padding: 10px">
                <table class=" table table-bordered table-hover datatable datatable-Client">
                    <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('permission.fields.column1') }}</th>
                        <th class="col-3">{{ trans('permission.fields.column2') }}</th>
                        <th class="col-2">{{ trans('permission.fields.column3') }}</th>
                        <th class="col-2" colspan="2">{{ trans('permission.fields.column4') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($permissions) && count($permissions)>0)
                        @foreach($permissions as $key => $permission)
                            <tr class="row" data-entry-id="{{ $permission->id }}">
                                <td class="col-1">{{ $permission->id }}</td>
                                <td class="col-3">{{ $permission->name ?? '' }}</td>
                                <td class="col-2">{{ $permission->updated_at ?? '' }}</td>
                                <td class="col-1">
                                    <button id="edit-[{{ $key }}]"
                                            class="btn btn-xs btn-info"
                                            data-id="{{ $permission->id }}"
                                            data-name="{{ $permission->name }}"
                                            data-toggle="modal"
                                            data-target="#modalCreatePermission"
                                    >{{ trans('global.button.btn_edit') }}</button>
                                </td>
                                <td class="col-1">
                                    <button id="delete-[{{ $key }}]"
                                            class="btn btn-xs btn-danger"
                                            data-id="{{ $permission->id }}"
                                            data-name="{{ $permission->name }}"
                                            data-toggle="modal"
                                            data-target="#modalDeletePermission"
                                    >{{ trans('global.button.btn_delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if(isset($permissions) && count($permissions) > 0 && $permissions instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <div class="pagination-sm">
                {{ $permissions->links() }}
            </div>
        @endif
    </div>

    @include('admin/permissions/modal._modalCreatePermission')
    @include('admin/permissions/modal._modalDeletePermission')
    @include('admin/modal._modalError')
    @include('admin/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/permission/index.js') }}"></script>
    <script src="{{ asset('js/permission/validationPermission.js') }}"></script>
@endsection
