<?php
namespace App\Http\Requests\OAuthClient;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\OAuthClient\OAuthClientRepositoryInterface;
use Illuminate\Validation\Validator;

class DeleteOAuthClientRequest extends FormRequest{

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
            'clientIdDelete'      => 'required',
        ];
    }

    public function messages(){
        return [
            'clientIdDelete.required'       => trans('oauthClient.error.delete_clientIdDelete_required'),
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
        if(isset($this->clientIdDelete)){
            $client = $this->oauthRepo->find($this->clientIdDelete);
            if(!$client){
                $validator->errors()->add('clientIdDelete',  trans('oauthClient.error.delete_clientIdDelete_notExists'));
            }
        }

        return;
    }
}
