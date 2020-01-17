{{--begin modal create new OAuth Client--}}
<div class="modal fade" id="modalCreateRole" tabindex="-1" role="dialog" aria-labelledby="modalCreateRole" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('role.header.create') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.roles.store') }}" method="POST" id="formCreateRole">
                    {{ csrf_field() }}
                    <input id="role-id-input" type="hidden" name="roleId" value="">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('role.label.label1') }}</label>
                        <div class="col-md-9">
                            <input id="role-name-input" name="roleName" type="text" class="form-control">
                        </div>
                    </div>
                    <!-- Redirect URL -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('role.label.label2') }}</label>
                        <div class="col-md-9">
                            <input id="role-isAdmin-input" name="roleIsAdmin" type="checkbox" class="form-control input-checkbox">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('global.button.btn_close') }}</button>
                <button type="button" id="btn-create-role" class="btn btn-success">{{ trans('global.button.btn_save') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal create new OAuth Client--}}
