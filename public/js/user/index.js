$(document).ready(function() {

    let btn_save_user = $('#btn-create-user');
    let btn_edit_user = $('#btn-create-user');
    let btn_delete_user = $('#btn-create-user');
    let modal_create_user = $('#modalCreateUser');
    let modal_delete_user = $('#modalCreateUser');
    let modal_error = $('#modalError');
    let modal_success = $('#modalSuccess');
    let modal_fail = $('#modalFail');
    let status = $('#status_flg');
    let form_create_user = $('#formCreateUser');
    let form_delete_user = $('#formCreateUser');
    let form_create_user_field_name = 'userName';
    let form_create_user_field_email = 'userEmail';


    //validate and submit form create new oauth-client
    btn_save_user.on('click', function () {
        let validation = new validationUser();
        validation.validateCreate();

        if(form_create_user.valid()){
            form_create_user.submit();
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

    //show edit oauth-client form
    // $('#modalEditOAuthClient').on('show.bs.modal', function(e) {
    //     let button = $(e.relatedTarget);
    //     let editForm = $('#editOAuthClientForm');
    //     editForm.find('input[name="clientIdEdit"]').val(button.attr('data-id'));
    //     editForm.find('input[name="clientNameEdit"]').val(button.attr('data-name'));
    //     editForm.find('input[name="clientUrlEdit"]').val(button.attr('data-url'));
    //
    //     clearEditForm();
    // });

    //show modal confirm before delete client
    // $('#modalConfirmDelete').on('show.bs.modal', function(e) {
    //     let button = $(e.relatedTarget);
    //     let deleteModal = $('#deleteOAuthClientForm');
    //
    //     deleteModal.find('input[name="clientIdDelete"]').val(button.data('id'));
    //
    //     $('.debug-information').html(
    //         '<p>Client ID: <strong>' + button.data('id') + '</strong></p>' +
    //         '<p>Client Name: <strong>' + button.data('name') + '</strong></p>' +
    //         '<p>Client Redirect URL: <strong>' + button.data('url') + '</strong></p>'
    //     );
    // });

    //when modal create show up
    modal_create_user.on('show.bs.modal', function(e) {
        clearCreateForm();
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    // function clearEditForm(){
    //     let createForm = $('#editOAuthClientForm');
    //
    //     createForm.find('input').removeClass("help-block");
    //     createForm.find('span.help-block').remove();
    // }

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        form_create_user.find('input[name="userName"]').val('');
        form_create_user.find('input[name="userEmail"]').val('');

        form_create_user.find('input').removeClass("help-block");
        form_create_user.find('span.help-block').remove();
    }
});
