<?php
namespace App\Services;

use App\Models\Role;
use App\Repositories\permission\PermissionRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionService{

    protected $roleRepo;

    public function __construct(PermissionRepositoryInterface $repository){
        $this->roleRepo = $repository;
    }

    /**
     * get all user.
     *
     * @return array
     */
    public function getAllRole(){
        return $this->roleRepo->getAll()->sortBy('name');
    }

    /**
     * create user.
     * @param $data
     * @return boolean
     */
    public function createOrUpdateRole($data){

        $isAdmin = isset($data['roleIsAdmin']) ? 1 : 0;

        DB::beginTransaction();
        try {
            $this->roleRepo->createOrUpdateRole($data, $isAdmin);
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
            $this->roleRepo->delete($data['roleId']);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * update role admin.
     * @param $data
     * @return boolean
     */
    public function updateRoleAdmin($data){

        $obj = [
            'isAdmin'       => $data['role_admin'],
            'updated_at'    => Carbon::now(),
        ];

        DB::beginTransaction();
        try {
            $this->roleRepo->update($data['role_id'], $obj);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }
}
