{{--begin modal create new OAuth Client--}}
<div class="modal fade" id="modalCreateNewOAuthClient" tabindex="-1" role="dialog" aria-labelledby="modalCreateNewOAuthClient" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ trans('oauthClient.header.create') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.clients.store') }}" method="POST" id="createOAuthClientForm">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('oauthClient.label.create_name') }}</label>
                        <div class="col-md-9">
                            <input id="oauth-client-name-input" name="clientName" type="text" class="form-control">
                            <span class="form-text text-muted">
                                {{ trans('oauthClient.describe.create_name') }}
                            </span>
                        </div>
                    </div>
                    <!-- Redirect URL -->
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{ trans('oauthClient.label.create_url') }}</label>
                        <div class="col-md-9">
                            <input id="oauth-client-url-input" type="text" class="form-control" name="clientUrl">
                            <span class="form-text text-muted">
                                {{ trans('oauthClient.describe.create_url') }}
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ trans('oauthClient.button.btn-close') }}</button>
                <button type="button" id="create-oauth-client-btn" class="btn btn-success">{{ trans('oauthClient.button.btn-create') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal create new OAuth Client--}}
