function validation(){
    let root = this;

    this.construct= function () {
        return root;
    };

    //begin validate for create
    this.validateCreate = function () {
        $('#createOAuthClientForm').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element){
                // error is <span>
                // element is <input>
                // error.addClass('help-block-note');
                // element.parent().next().append(error);
                element.after(error);
            },
            highlight: function(element){
                $(element).parent().removeClass("error");
                $(element).addClass('form-control help-block');
            },
        });
        this.removeValidFormCreate();
        this.validElementsCreate();
        return;
    };

    this.removeValidFormCreate = function () {
        $("#createOAuthClientForm").find('input, select, textarea').each(function() {
            $(this).rules('remove');
            $(this).removeClass('help-block');
        });
    };

    this.validElementsCreate = function(){
        $('input[name="clientName"]').rules("add",{
            required: true,
            messages: {
                required: 'Please provide a name.'
            }
        });

        $('input[name="clientUrl"]').rules("add",{
            required: true,
            messages: {
                required: 'Please provide a redirect url.'
            }
        });
    };
    //end validate for create

    //begin validate for edit
    this.validateEdit = function () {
        $('#editOAuthClientForm').validate({
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function(error, element){
                element.after(error);
            },
            highlight: function(element){
                $(element).parent().removeClass("error");
                $(element).addClass('form-control help-block');
            },
        });
        this.removeValidFormEdit();
        this.validElementsEdit();
        return;
    };

    this.removeValidFormEdit = function () {
        $("#editOAuthClientForm").find('input, select, textarea').each(function() {
            $(this).rules('remove');
            $(this).removeClass('help-block');
        });
    };

    this.validElementsEdit = function(){
        $('input[name="clientNameEdit"]').rules("add",{
            required: true,
            messages: {
                required: 'Please provide a name.'
            }
        });

        $('input[name="clientUrlEdit"]').rules("add",{
            required: true,
            messages: {
                required: 'Please provide a redirect url.'
            }
        });
    };
    //end validate for edit

    this.construct();
}
