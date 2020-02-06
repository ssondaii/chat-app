@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/role/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div style="float: left">
                @if(isset($roles))
                    <span>{{ trans('role.title') }}: {{ $roles->name }}</span>
                @endif
            </div>
            <div style="float: right;">
                <button id="btn_save_role_permission"
                        type="button"
                        class="btn btn-outline-info">
                    {{ trans('global.button.btn_save') }}
                </button>
                <a href="{{ route('admin.roles.index') }}"
                   class="btn btn-outline-secondary">
                    {{ trans('global.button.btn_cancel') }}
                </a>
            </div>
        </div>

        <div class="card-body" style="clear: both;">
            @if(isset($roles) && isset($diff_permission))
                <form action="{{ route('admin.roles.update_role_permission') }}" method="POST" id="formUpdateRolePermission">
                    {{ csrf_field() }}
                    <input id="role-id-input" type="hidden" name="roleId" value="{{ $roles->id }}">
                    <div class="left">
                        <p class="drag-drop-header text-align-center">{{ trans('role.header.attach') }}</p>
                        <div id="sortable1" class="connectedSortable">
                            @foreach($roles->permissions as $key => $permission)
                                <div class="ui-state-default drag-drop-item">
                                    <div class="form-check">
                                        <input type="checkbox" disabled name="list_check_permission[]" class="form-check-input" checked="checked" id="materialUnchecked-[{{ $permission->id }}]">
                                        <label class="form-check-label" for="materialUnchecked-[{{ $permission->id }}]"><span>{{ $permission->name }}</span></label>
                                    </div>
                                    <input type="hidden" name="list_id_permission[]" value="{{ $permission->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
                    <div class="right">
                        <p class="drag-drop-header text-align-center">{{ trans('role.header.detach') }}</p>
                        <div id="sortable2" class="connectedSortable">
                            @foreach($diff_permission as $key => $permission)
                                <div class="ui-state-default drag-drop-item">
                                    <div class="form-check">
                                        <input type="checkbox" disabled name="list_check_permission[]" class="form-check-input" id="materialUnchecked-[{{ $permission['id'] }}]">
                                        <label class="form-check-label" for="materialUnchecked-[{{ $permission['id'] }}]"><span>{{ $permission['name'] }}</span></label>
                                    </div>
                                    <input type="hidden" name="list_id_permission[]" value="{{ $permission['id'] }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
            @endif
        </div>
    </div>
    @include('admin/modal._modalError')
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/role/drag_drop.js') }}"></script>
@endsection
