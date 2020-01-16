<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ trans('oauthClient.header.delete') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>You are about to delete one track, this procedure is irreversible.</p>
                <p>Do you want to proceed?</p>
                <p class="debug-information"></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('oauthClient.button.btn-close') }}</button>
                <form id="deleteOAuthClientForm" action="{{ route('admin.clients.delete') }}" method="POST"  style="display: inline-block;">
                    <input type="hidden" name="_method" value="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="clientIdDelete" value="">
                    <input type="submit" class="btn btn-danger" value="{{ trans('oauthClient.button.btn-delete') }}">
                </form>
            </div>
        </div>
    </div>
</div>
