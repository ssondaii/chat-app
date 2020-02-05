@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('css/role/index.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('role.title_role_permission') }}
        </div>

        <div class="card-body" style="clear: both;">
            @if(isset($roles) && isset($permissions) && isset($diff_role_permission))
                <form action="{{ route('admin.roles.update_role_permission') }}" method="POST" id="formUpdateRolePermission">
                    {{ csrf_field() }}
                    <input id="role-id-input" type="hidden" name="roleId" value="{{ $roles->id }}">
                    <div class="left">
                        <div id="sortable1" class="connectedSortable">
                            @foreach($roles->permissions as $key => $permission)
                                <div class="ui-state-default drag-drop-item">
                                    <span>{{ $permission->name }}</span>
                                    <input type="hidden" name="list_id_permission[]" value="{{ $permission->id }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
                    <div class="right">
                        <div id="sortable2" class="connectedSortable">
                            @foreach($permissions as $key => $permission)
                                @if(in_array($permission->id, $diff_role_permission))
                                    <div class="ui-state-default drag-drop-item">
                                        <span>{{ $permission->name }}</span>
                                        <input type="hidden" name="list_id_permission[]" value="{{ $permission->id }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/role/drag_drop.js') }}"></script>
@endsection
