@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/role/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('role.title') }}
        </div>

        <div class="card-body">
            <button type="button"
                    class="btn btn-outline-success"
                    data-toggle="modal"
                    data-target="#modalCreateRole"
                    style="margin-bottom: 10px;">
                {{ trans('global.button.btn_create') }}
            </button>
            <div class="table-responsive text-align-center" style="padding: 10px">
                <table class=" table table-bordered table-hover datatable datatable-Client">
                    <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('role.fields.column1') }}</th>
                        <th class="col-2">{{ trans('role.fields.column2') }}</th>
                        <th class="col-5">{{ trans('role.fields.column3') }}</th>
                        <th class="col-2">{{ trans('role.fields.column4') }}</th>
                        <th class="col-2" colspan="2">{{ trans('role.fields.column5') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($roles) && count($roles)>0)
                        @foreach($roles as $key => $role)
                            <tr class="row" data-entry-id="{{ $role->id }}">
                                <td class="col-1">{{ $role->id }}</td>
                                <td class="col-2">{{ $role->name ?? '' }}</td>
                                <td class="col-4">
                                    @foreach($role->permissions as $permission_key => $permission)
                                        <span class="badge badge-info">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td class="col-1">
                                    <form action="{{ route('admin.roles.edit_role_permission') }}" method="POST"  style="display: inline-block;">
                                        <input type="hidden" name="_method" value="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="roleId" value="{{ $role->id }}">
                                        <input type="submit" class="btn btn-outline-info btn-sm" value="{{ trans('global.button.btn_edit') }}">
                                    </form>
                                </td>
                                <td class="col-2">{{ $role->updated_at->format('d/m/Y') ?? '' }}</td>
                                <td class="col-1">
                                    <button id="edit-[{{ $key }}]"
                                            class="btn btn-xs btn-info"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->name }}"
                                            data-toggle="modal"
                                            data-target="#modalCreateRole"
                                    >{{ trans('global.button.btn_edit') }}</button>
                                </td>
                                <td class="col-1">
                                    <button id="delete-[{{ $key }}]"
                                            class="btn btn-xs btn-danger"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->name }}"
                                            data-toggle="modal"
                                            data-target="#modalDeleteRole"
                                    >{{ trans('global.button.btn_delete') }}</button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        @if(isset($roles) && count($roles) > 0 && $roles instanceof \Illuminate\Pagination\LengthAwarePaginator )
            <div class="pagination-sm">
                {{ $roles->links() }}
            </div>
        @endif
    </div>

    @include('admin/roles/modal._modalCreateRole')
    @include('admin/roles/modal._modalDeleteRole')
    @include('admin/modal._modalError')
    @include('admin/modal._modalResult')

@endsection
@section('scripts')
    <script src="{{ asset('js/role/index.js') }}"></script>
    <script src="{{ asset('js/role/validationRole.js') }}"></script>
@endsection
