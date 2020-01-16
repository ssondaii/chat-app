{{--begin modal create new OAuth Client--}}
<div class="modal fade" id="modalCreateUser" tabindex="-1" role="dialog" aria-labelledby="modalCreateUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('user.header.create') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.store') }}" method="POST" id="formCreateUser">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('user.label.create_name') }}</label>
                        <div class="col-md-9">
                            <input id="user-name-input" name="userName" type="text" class="form-control">
                        </div>
                    </div>
                    <!-- Redirect URL -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('user.label.create_email') }}</label>
                        <div class="col-md-9">
                            <input id="user-email-input" type="text" class="form-control" name="userEmail">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('global.button.btn_close') }}</button>
                <button type="button" id="btn-create-user" class="btn btn-success">{{ trans('global.button.btn_save') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal create new OAuth Client--}}
