$(document).ready(function() {
    let form_create = $('#createOAuthClientForm');
    let form_edit = $('#editOAuthClientForm');
    let form_delete = $('#deleteOAuthClientForm');
    let modal_create = $('#modalCreateNewOAuthClient');
    let modal_edit = $('#modalEditOAuthClient');
    let modal_delete = $('#modalConfirmDelete');
    let modal_error = $('#modalError');
    let modal_success = $('#modalSuccess');
    let modal_fail = $('#modalFail');
    let btn_save_create = $('#create-oauth-client-btn');
    let btn_save_edit = $('#edit-oauth-client-btn');
    let status = $('#status_flg');

    //validate and submit form create new oauth-client
    btn_save_create.on('click', function () {
        let oauthClientValidation = new validation();
        oauthClientValidation.validateCreate();

        if(form_create.valid()){
            form_create.submit();
        }
    });

    //validate and submit form edit oauth-client
    btn_save_edit.on('click', function () {
        let oauthClientValidation = new validation();
        oauthClientValidation.validateEdit();

        if(form_edit.valid()){
            form_edit.submit();
        }
    });

    // show modal error
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

    //show edit oauth-client form
    modal_edit.on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);

        form_edit.find('input[name="clientIdEdit"]').val(button.attr('data-id'));
        form_edit.find('input[name="clientNameEdit"]').val(button.attr('data-name'));
        form_edit.find('input[name="clientUrlEdit"]').val(button.attr('data-url'));

        clearEditForm();
    });

    //show modal confirm before delete client
    modal_delete.on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);

        form_delete.find('input[name="clientIdDelete"]').val(button.data('id'));

        $('.debug-information').html(
            '<p>Client ID: <strong>' + button.data('id') + '</strong></p>' +
            '<p>Client Name: <strong>' + button.data('name') + '</strong></p>' +
            '<p>Client Redirect URL: <strong>' + button.data('url') + '</strong></p>'
        );
    });

    //when modal create show up
    modal_create.on('show.bs.modal', function(e) {
        clearCreateForm();
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearEditForm(){
        form_edit.find('input').removeClass("help-block");
        form_edit.find('span.help-block').remove();
    }

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        form_create.find('input[name="clientName"]').val('');
        form_create.find('input[name="clientUrl"]').val('');
        form_create.find('input').removeClass("help-block");
        form_create.find('span.help-block').remove();
    }
});
