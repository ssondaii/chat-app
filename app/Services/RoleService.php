<?php
namespace App\Services;

use App\Models\Permission;
use App\Models\Role;
use App\Repositories\role\RoleRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleService{

    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $repository){
        $this->roleRepo = $repository;
    }

    /**
     * get all role.
     *
     * @return array
     */
    public function getAllRole(){
        return $this->roleRepo->getAllRoleWithPermission()->sortBy('name');
    }

    /**
     * get role by id.
     *
     * @param $id
     * @return array
     */
    public function getRoleById($id){
        return $this->roleRepo->getRoleByIdWithPermission($id);
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
     * get array id permission, that doesn't belong to role_id.
     *
     * @param $id
     * @return array
     */
    public function getDiffRolePermission($id){

        list($roles, $permissions) = [
            $this->getRoleById($id),
            Permission::all()
        ];

        list($array_role_permission, $array_all_permission) = [
            array_column($roles->permissions->toArray(), 'id'),
            array_column($permissions->toArray(), 'id')
        ];

        return array_diff($array_all_permission, $array_role_permission);
    }
}
