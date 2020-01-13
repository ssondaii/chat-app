$(document).ready(function() {
    //validate and submit form create new oauth-client
    $('#create-oauth-client-btn').on('click', function () {
        let oauthClientValidation = new validation();
        oauthClientValidation.validateCreate();

        if($('#createOAuthClientForm').valid()){
            $('#createOAuthClientForm').submit();
        }
    });

    //validate and submit form edit oauth-client
    $('#edit-oauth-client-btn').on('click', function () {
        let oauthClientValidation = new validation();
        oauthClientValidation.validateEdit();

        if($('#editOAuthClientForm').valid()){
            $('#editOAuthClientForm').submit();
        }
    });

    // show modal error
    if($('#modalError').length){
        $("#modalError").modal("show");
    }

    // show modal message result
    if($('#status_flg').length){
        if($('#status_flg').val() === '1'){
            $('#modalSuccess').modal("show");
        }
        else if($('#status_flg').val() === '-1'){
            $('#modalFail').modal("show");
        }
    }

    //show edit oauth-client form
    $('#modalEditOAuthClient').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let editForm = $('#editOAuthClientForm');
        editForm.find('input[name="clientIdEdit"]').val(button.attr('data-id'));
        editForm.find('input[name="clientNameEdit"]').val(button.attr('data-name'));
        editForm.find('input[name="clientUrlEdit"]').val(button.attr('data-url'));

        clearEditForm();
    });

    //show modal confirm before delete client
    $('#modalConfirmDelete').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let deleteModal = $('#deleteOAuthClientForm');

        deleteModal.find('input[name="clientIdDelete"]').val(button.data('id'));

        $('.debug-information').html(
            '<p>Client ID: <strong>' + button.data('id') + '</strong></p>' +
            '<p>Client Name: <strong>' + button.data('name') + '</strong></p>' +
            '<p>Client Redirect URL: <strong>' + button.data('url') + '</strong></p>'
        );
    });

    //when modal create show up
    $('#modalCreateNewOAuthClient').on('show.bs.modal', function(e) {
        clearCreateForm();
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearEditForm(){
        let createForm = $('#editOAuthClientForm');

        createForm.find('input').removeClass("help-block");
        createForm.find('span.help-block').remove();
    }

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        let createForm = $('#createOAuthClientForm');
        createForm.find('input[name="clientName"]').val('');
        createForm.find('input[name="clientUrl"]').val('');

        createForm.find('input').removeClass("help-block");
        createForm.find('span.help-block').remove();
    }
});
