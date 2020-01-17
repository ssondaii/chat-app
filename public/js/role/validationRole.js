function validationRole(){
    let form_create = $('#formCreateUser');
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
        $('input[name="userName"]').rules("add",{
            required: true,
            messages: {
                required: 'Please provide a name.'
            }
        });

        $('input[name="userEmail"]').rules("add",{
            required: true,
            email: true,
            messages: {
                required: 'Please provide a email.',
                email: 'Email must be in proper format.'
            }
        });
    };
    //end validate for create

    this.construct();
}
