@if(session('status'))
    <input type="hidden" id="status_flg" value="{{ session('status') }}">
@endif
{{--begin modal result success--}}
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="modalSuccess" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title element-align-center" id="modalSuccessTitle">{{ trans('global.header.success') }}</h5>
            </div>
            <div class="modal-body text-align-center">
                {{ trans('global.message.msg_success') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success element-align-center" data-dismiss="modal">{{ trans('global.button.btn_confirm') }}</button>
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
                <h5 class="modal-title element-align-center" id="modalFailTitle">{{ trans('global.header.fail') }}</h5>
            </div>
            <div class="modal-body text-align-center">
                {{ trans('global.message.msg_fail') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger element-align-center" data-dismiss="modal">{{ trans('global.button.btn_cancel') }}</button>
            </div>
        </div>
    </div>
</div>
{{--end modal result fail--}}
