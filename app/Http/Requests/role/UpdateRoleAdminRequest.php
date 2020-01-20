<?php
namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\role\RoleRepositoryInterface;
use Illuminate\Validation\Validator;

class UpdateRoleAdminRequest extends FormRequest{

    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $repository){
        $this->roleRepo = $repository;
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
            'role_id'      => 'required',
            'role_admin'   => 'required|boolean'
        ];
    }

    public function messages(){
        return [
            'role_id.required'          => trans('role.validate.role_id_required'),
            'role_admin.required'       => trans('role.validate.role_admin_required'),
            'role_admin.boolean'        => trans('role.validate.role_admin_boolean'),
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
        $role = $this->roleRepo->find($this->role_id);
        if(!$role){
            $validator->errors()->add('role_id',  trans('role.validate.role_id_exist'));
        }

        return;
    }
}
