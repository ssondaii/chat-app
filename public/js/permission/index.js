$(document).ready(function() {

    let btn_save = $('#btn-create-permission');
    let modal_create = $('#modalCreatePermission');
    let modal_delete = $('#modalDeletePermission');
    let modal_error = $('#modalError');
    let modal_success = $('#modalSuccess');
    let modal_fail = $('#modalFail');
    let status = $('#status_flg');
    let form_create = $('#formCreatePermission');

    //validate and submit form create new oauth-client
    btn_save.on('click', function () {
        let validation = new validationPermission();
        validation.validateCreate();

        if(form_create.valid()){
            form_create.submit();
        }
    });

    //show modal error
    if(modal_error.length){
        modal_error.modal("show");
    }

    // show modal message result
    if(status.length){
        if(status.val() === '1'){
            modal_success.modal("show");
        }
        else if(status.val() === '-1'){
            modal_fail.modal("show");
        }
    }

    //show modal confirm before delete client
    modal_delete.on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);

        modal_delete.find('input[name="permissionId"]').val(button.data('id'));

        $('.debug-information').html(
            '<p>Permission ID: <strong>' + button.data('id') + '</strong></p>' +
            '<p>Permission Name: <strong>' + button.data('name') + '</strong></p>'
        );
    });

    //when modal create show up
    modal_create.on('show.bs.modal', function(e) {
        clearCreateForm();

        let button = $(e.relatedTarget);

        form_create.find('input[name="permissionId"]').val(button.data('id'));
        form_create.find('input[name="permissionName"]').val(button.data('name'));
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        form_create.find('input[name="permissionId"]').val('');
        form_create.find('input[name="permissionName"]').val('');

        form_create.find('input').removeClass("help-block");
        form_create.find('span.help-block').remove();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});
