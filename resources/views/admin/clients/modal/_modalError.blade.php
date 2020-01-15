@if( $errors ->any() )
    <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalError" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title element-align-center" id="modalErrorTitle">{{ trans('oauthClient.header.error') }}</h5>
                </div>
                <div class="modal-body text-align-left element-align-center">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger element-align-center" data-dismiss="modal">{{ trans('oauthClient.button.btn-close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endif
