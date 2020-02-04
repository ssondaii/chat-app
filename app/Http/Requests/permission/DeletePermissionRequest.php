<?php
namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\permission\PermissionRepositoryInterface;
use Illuminate\Validation\Validator;

class DeletePermissionRequest extends FormRequest{

    protected $perRepo;

    public function __construct(PermissionRepositoryInterface $repository){
        $this->perRepo = $repository;
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
            'permissionId'      => 'required',
        ];
    }

    public function messages(){
        return [
            'permissionId.required'       => trans('permission.validate.permission_id_required'),
        ];
    }

    /**
     * @param Validator $validator
     */
    public function withValidator(Validator $validator)
    {
        if (!$validator->fails()){
            $validator->after(function (Validator $validator) {
                $this->checkInputData($validator);
            });
        }
    }

    public function checkInputData(Validator $validator){
        //check client is exists
        $permission = $this->perRepo->find($this->permissionId);
        if(!$permission){
            $validator->errors()->add('permissionId',  trans('permission.validate.permission_id_exist'));
        }

        return;
    }
}
