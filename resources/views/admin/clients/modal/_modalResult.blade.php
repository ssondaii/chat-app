{{--begin modal result success--}}
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccess" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title element-align-center" id="modalSuccessTitle">{{ trans('oauthClient.header.success') }}</h5>
            </div>
            <div class="modal-body text-align-center">
                {{ trans('oauthClient.message.success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success element-align-center" data-dismiss="modal">{{ trans('oauthClient.button.btn-confirm') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal result success--}}

{{--begin modal result fail--}}
<div class="modal fade" id="modalFail" tabindex="-1" role="dialog" aria-labelledby="modalFail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title element-align-center" id="modalFailTitle">{{ trans('oauthClient.header.fail') }}</h5>
            </div>
            <div class="modal-body text-align-center">
                {{ trans('oauthClient.message.fail') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger element-align-center" data-dismiss="modal">{{ trans('oauthClient.button.btn-cancel') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal result fail--}}
