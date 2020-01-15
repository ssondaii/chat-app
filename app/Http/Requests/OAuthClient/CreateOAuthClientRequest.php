<?php

namespace App\Http\Requests\OAuthClient;

use Illuminate\Foundation\Http\FormRequest;

class CreateOAuthClientRequest extends FormRequest
{
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
            'clientName'    => 'required',
            'clientUrl'     => 'required',
        ];
    }

    public function messages(){
        return [
            'clientName.required'     => trans('oauthClient.error.create_clientName_required'),
            'clientUrl.required'      => trans('oauthClient.error.create_clientUrl_required'),
        ];
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
