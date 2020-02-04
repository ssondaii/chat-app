<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CreateOrUpdatePermissionRequest extends FormRequest
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
            'permissionName'      => 'required|max:25|unique:permissions,name,' . $request['permissionId'],
        ];
    }

    public function messages(){
        return [
            'permissionName.required'    => trans('permission.validate.permissionName_required'),
            'permissionName.max'         => trans('permission.validate.permissionName_maxlength_25'),
            'permissionName.unique'      => trans('permission.validate.permissionName_unique'),
        ];
    }
}
