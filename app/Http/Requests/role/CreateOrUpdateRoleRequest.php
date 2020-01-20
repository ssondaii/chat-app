<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateOrUpdateRoleRequest extends FormRequest
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

        return [
            'roleName'      => 'required|max:10|unique:roles,name,' . $request['roleId'],
        ];
    }

    public function messages(){
        return [
            'roleName.required'    => trans('role.validate.roleName_required'),
            'roleName.max'         => trans('role.validate.roleName_maxlength_10'),
            'roleName.unique'      => trans('role.validate.roleName_unique'),
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
