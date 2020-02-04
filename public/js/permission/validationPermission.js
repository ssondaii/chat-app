function validationPermission(){
    let form_create = $('#formCreatePermission');
    let root = this;

    this.construct= function () {
        return root;
    };

    //begin validate for create
    this.validateCreate = function () {
        form_create.validate({
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
        form_create.find('input, select, textarea').each(function() {
            $(this).rules('remove');
            $(this).removeClass('help-block');
        });
    };

    this.validElementsCreate = function(){
        $('input[name="permissionName"]').rules("add",{
            required: true,
            maxlength: 25,
            messages: {
                required: 'Please provide a name.',
                maxlength: 'The maximum length of this field is 25.'
            }
        });

        // $('input[name="userEmail"]').rules("add",{
        //     required: true,
        //     email: true,
        //     messages: {
        //         required: 'Please provide a email.',
        //         email: 'Email must be in proper format.'
        //     }
        // });
    };
    //end validate for create

    this.construct();
}
