<?php
namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use App\Repositories\user\UserRepositoryInterface;
use Illuminate\Validation\Validator;

class DeleteUserRequest extends FormRequest{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $repository){
        $this->userRepo = $repository;
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
            'userId'      => 'required',
        ];
    }

    public function messages(){
        return [
            'userId.required'       => trans('user.validate.userId_required'),
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
        $user = $this->userRepo->find($this->userId);
        if(!$user){
            $validator->errors()->add('userId',  trans('user.validate.userId_exist'));
        }

        return;
    }
}
