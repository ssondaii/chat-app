{{--begin modal edit OAuth Client--}}
<div class="modal fade" id="modalEditOAuthClient" tabindex="-1" role="dialog" aria-labelledby="modalEditOAuthClient" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('oauthClient.header.edit') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.users.update') }}" method="POST" id="editOAuthClientForm">
                    {{ csrf_field() }}
                    <input id="oauth-client-id-input-edit" type="hidden" name="clientIdEdit" value="">
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('oauthClient.label.create_name') }}</label>
                        <div class="col-md-9">
                            <input id="oauth-client-name-input-edit" name="clientNameEdit" type="text" class="form-control">
                            <span class="form-text text-muted">
                                {{ trans('oauthClient.describe.create_name') }}
                            </span>
                        </div>
                    </div>
                    <!-- Redirect URL -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('oauthClient.label.create_url') }}</label>
                        <div class="col-md-9">
                            <input id="oauth-client-url-input-edit" type="text" class="form-control" name="clientUrlEdit">
                            <span class="form-text text-muted">
                                {{ trans('oauthClient.describe.create_url') }}
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('oauthClient.button.btn-close') }}</button>
                <button type="button" id="edit-oauth-client-btn" class="btn btn-success">{{ trans('oauthClient.button.btn-save') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal edit OAuth Client--}}

