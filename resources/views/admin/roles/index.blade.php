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
            <div class="table-responsive" style="padding: 10px">
                <table class=" table table-bordered table-hover datatable datatable-Client">
                    <thead>
                    <tr class="row">
                        <th class="col-1">{{ trans('role.fields.column1') }}</th>
                        <th class="col-2">{{ trans('role.fields.column2') }}</th>
                        <th class="col-2">{{ trans('role.fields.column3') }}</th>
                        <th class="col-2" colspan="2">{{ trans('role.fields.column4') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($roles) && count($roles)>0)
                        @foreach($roles as $key => $role)
                            <tr class="row" data-entry-id="{{ $role->id }}">
                                <td class="col-1">{{ $key + 1 }}</td>
                                <td class="col-2">{{ $role->name ?? '' }}</td>
                                <td class="col-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="checkbox-isAdmin input-checkbox" @if($role->isAdmin === 1) checked="checked"  @endif>
                                    </div>
                                </td>
                                <td class="col-1">
                                    <button id="edit-[{{ $key }}]"
                                            class="btn btn-xs btn-info"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->name }}"
                                            data-email="{{ $role->isAdmin }}"
                                            data-toggle="modal"
                                            data-target="#modalCreateRole"
                                    >{{ trans('global.button.btn_edit') }}</button>
                                </td>
                                <td class="col-1">
                                    <button id="delete-[{{ $key }}]"
                                            class="btn btn-xs btn-danger"
                                            data-id="{{ $role->id }}"
                                            data-name="{{ $role->name }}"
                                            data-email="{{ $role->isAdmin }}"
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
    <script src="{{ asset('js/role/validationRole.js') }}</script>
@endsection
