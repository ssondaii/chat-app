export default {
    convertErrorFromValidate: function(result){
        let errors = result.responseJSON.errors;
        let html_message = '';
        for(let e in errors){
            let message = errors[e][0];
            html_message += message + '<br>';
        }
        return html_message;
    }
}
