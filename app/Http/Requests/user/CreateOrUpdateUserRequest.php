<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateOrUpdateUserRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request){
        //dd($request['userId']);
        return [
            'userName'      => 'required',
            'userEmail'     => 'required|email|unique:users,email,' . $request['userId'],
        ];
    }

    public function messages(){
        return [
            'userName.required'    => trans('user.validate.userName_required'),
            'userEmail.required'   => trans('user.validate.userEmail_required'),
            'userEmail.email'      => trans('user.validate.userEmail_email'),
            'userEmail.unique'     => trans('user.validate.userEmail_unique'),
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
