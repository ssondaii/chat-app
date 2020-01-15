<?php
namespace App\Http\Requests\OAuthClient;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\OAuthClient\OAuthClientRepositoryInterface;
use Illuminate\Validation\Validator;

class EditOAuthClientRequest extends FormRequest{

    protected $oauthRepo;

    public function __construct(OAuthClientRepositoryInterface $repository){
        $this->oauthRepo = $repository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        //TODO check role admin
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'clientIdEdit'      => 'required',
            'clientNameEdit'    => 'required',
            'clientUrlEdit'     => 'required',
        ];
    }

    public function messages(){
        return [
            'clientIdEdit.required'       => trans('oauthClient.error.edit_clientIdEdit_required'),
            'clientNameEdit.required'     => trans('oauthClient.error.edit_clientNameEdit_required'),
            'clientUrlEdit.required'      => trans('oauthClient.error.edit_clientUrlEdit_required'),
        ];
    }

    /**
     * @param Validator $validator
     */
    public function withValidator(Validator $validator)
    {
        $validator->after(function (Validator $validator) {
            $this->checkInputData($validator);
        });
    }

    public function checkInputData(Validator $validator){

        //check client is exists
        if(isset($this->clientIdEdit)){
            $client = $this->oauthRepo->find($this->clientIdEdit);
            if(!$client){
                $validator->errors()->add('clientIdEdit',  trans('oauthClient.error.edit_clientIdEdit_notExists'));
            }
        }

        return;
    }

//    protected function failedValidation(Validator $validator)
//    {
//        $errors = (new ValidationException($validator))->errors();
//        throw new HttpResponseException(response()->json(
//            [
//                'errors' => $errors,
//                'status_code' => 422,
//            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
//    }
}
