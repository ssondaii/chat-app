<?php
namespace App\Services;

use App\Models\Role;
use App\Repositories\role\RoleRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleService{

    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $repository){
        $this->roleRepo = $repository;
    }

    /**
     * get all user.
     *
     * @return array
     */
    public function getAllRole(){
        return $this->roleRepo->getAll();
    }

    /**
     * create user.
     * @param $data
     * @return boolean
     */
    public function createOrUpdateRole($data){

        DB::beginTransaction();
        try {
            $this->roleRepo->createOrUpdateRole($data);
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
    public function deleteRole($data){

        DB::beginTransaction();
        try {
            $this->roleRepo->delete($data['userId']);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

}
