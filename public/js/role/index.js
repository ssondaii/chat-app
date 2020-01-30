$(document).ready(function() {

    let btn_save = $('#btn-create-role');
    let modal_create = $('#modalCreateRole');
    let modal_delete = $('#modalDeleteRole');
    let modal_error = $('#modalError');
    let modal_success = $('#modalSuccess');
    let modal_fail = $('#modalFail');
    let status = $('#status_flg');
    let form_create = $('#formCreateRole');
    let modal_error_for_ajax = $('#modalErrorForAjax');

    //validate and submit form create new oauth-client
    btn_save.on('click', function () {
        let validation = new validationRole();
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

        modal_delete.find('input[name="userId"]').val(button.data('id'));

        $('.debug-information').html(
            '<p>User ID: <strong>' + button.data('id') + '</strong></p>' +
            '<p>User Name: <strong>' + button.data('name') + '</strong></p>' +
            '<p>User Email: <strong>' + button.data('email') + '</strong></p>'
        );
    });

    //when modal create show up
    modal_create.on('show.bs.modal', function(e) {
        clearCreateForm();

        let button = $(e.relatedTarget);

        // form_create.find('input[name="roleId"]').val(button.attr('data-id'));
        // form_create.find('input[name="roleName"]').val(button.attr('data-name'));
        // form_create.find('input[name="roleIsAdmin"]').val(button.attr('data-email'));
    });

    //remove class help-block of <input> and remove <span class='help-block'>
    function clearCreateForm() {
        form_create.find('input[name="roleId"]').val('');
        form_create.find('input[name="roleName"]').val('');
        form_create.find('input[name="roleIsAdmin"]').prop('checked', false);

        form_create.find('input').removeClass("help-block");
        form_create.find('span.help-block').remove();
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //update database when change checkbox isAdmin
    $('.checkbox-isAdmin').on('click',  function () {
        // console.log($(this).val());
        // console.log($(this).is(':checked'));
        let role_id = $(this).val();
        let role_admin = 0;
        if($(this).is(':checked')){
            role_admin = 1;
        }

        $.ajax({
            type: "POST",
            data: {
                role_id: role_id,
                role_admin: role_admin
            },
            url: $('#url_update_role_admin').val(),
        }).done(function( result ) {
            console.log('done!');
            if ( result == 1 ){
                modal_success.modal("show");
            }else if ( result == -1 ){
                modal_fail.modal("show");
            }

        }).fail(function( result ) {
            if(result.status === 422 ){
                let errors = result.responseJSON.errors;
                let html_message = '';
                for(let e in errors){
                    let message = errors[e][0];
                    html_message += '<p>' +  message + '</p>';
                }

                $('#message_error_content').html(html_message);
                modal_error_for_ajax.modal("show");
            }
        });
    });
});
