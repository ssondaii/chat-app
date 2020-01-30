$(document).ready(function() {

    let btn_save_user = $('#btn-create-user');
    let modal_create_user = $('#modalCreateUser');
    let modal_delete_user = $('#modalDeleteUser');
    let modal_error = $('#modalError');
    let modal_success = $('#modalSuccess');
    let modal_fail = $('#modalFail');
    let status = $('#status_flg');
    let form_create_user = $('#formCreateUser');


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

    //show modal confirm before delete client
    modal_delete_user.on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);

        modal_delete_user.find('input[name="userId"]').val(button.data('id'));

        $('.debug-information').html(
            '<p>User ID: <strong>' + button.data('id') + '</strong></p>' +
            '<p>User Name: <strong>' + button.data('name') + '</strong></p>' +
            '<p>User Email: <strong>' + button.data('email') + '</strong></p>'
        );
    });

    //when modal create show up
    modal_create_user.on('show.bs.modal', function(e) {
        clearCreateForm();

        let button = $(e.relatedTarget);

        form_create_user.find('input[name="userId"]').val(button.data('id'));
        form_create_user.find('input[name="userName"]').val(button.data('name'));
        form_create_user.find('input[name="userEmail"]').val(button.data('email'));
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        form_create_user.find('input[name="userId"]').val('');
        form_create_user.find('input[name="userName"]').val('');
        form_create_user.find('input[name="userEmail"]').val('');

        form_create_user.find('input').removeClass("help-block");
        form_create_user.find('span.help-block').remove();
    }
});
