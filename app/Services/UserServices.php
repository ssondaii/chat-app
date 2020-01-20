<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServices{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $repository){
        $this->userRepo = $repository;
    }

    /**
     * get all user.
     *
     * @return array
     */
    public function getAllUser(){
        return $this->userRepo->getAll()->sortBy('name');
    }

    /**
    * create user.
    * @param $data
    * @return boolean
    */
    public function createOrUpdateUser($data){

        DB::beginTransaction();
        try {
            $this->userRepo->createOrUpdateUser($data);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * delete a user.
     * @param $data
     * @return boolean
     */
    public function deleteUser($data){

        DB::beginTransaction();
        try {
            $this->userRepo->delete($data['userId']);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

}
