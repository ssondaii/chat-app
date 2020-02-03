{{--begin modal create new permission--}}
<div class="modal fade" id="modalCreatePermission" tabindex="-1" role="dialog" aria-labelledby="modalCreatePermission" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('permission.header.create') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.permissions.store') }}" method="POST" id="formCreatePermission">
                    {{ csrf_field() }}
                    <input id="permission-id-input" type="hidden" name="permissionId" value="">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('permission.label.label1') }}</label>
                        <div class="col-md-9">
                            <input id="permission-name-input" name="permissionName" type="text" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('global.button.btn_close') }}</button>
                <button type="button" id="btn-create-permission" class="btn btn-success">{{ trans('global.button.btn_save') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal create new permission--}}
