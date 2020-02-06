<?php
namespace App\Repositories\role;

use App\Repositories\EloquentRepository;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class RoleEloquentRepository extends EloquentRepository implements RoleRepositoryInterface {

    public function getModel()
    {
        return Role::class;
    }

    /**
     * create or update role
     *
     * @param $data
     */
    public function createOrUpdateRole($data)
    {
        Role::updateOrCreate(
            [
                'id'            => $data['roleId'],
            ],
            [
                'name'          => $data['roleName'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        );
    }

    /**
     * get all role with permission igger loading
     *
     * @return array
     */
    public function getAllRoleWithPermission()
    {
        return $this->_model::with('permissions')->get();
    }

    /**
     * get 1 role with permission igger loading
     *
     * @param $id
     * @return void
     */
    public function getRoleByIdWithPermission($id)
    {
        return $this->_model::with('permissions')->find($id);
    }

    /**
     * update role permission relationship
     *
     * @param $roleId
     * @param $array_permission_id
     * @return void
     */
    public function updateRolePermission($roleId, Array $array_permission_id = array())
    {

        $role = $this->_model::find($roleId);

        $role->permissions()->detach();

        $role->permissions()->attach($array_permission_id);

    }
}
