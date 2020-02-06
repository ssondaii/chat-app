<?php
namespace App\Repositories\role;

use Illuminate\Http\Response;

interface RoleRepositoryInterface{

    /**
     * create or update role
     *
     * @param $data
     */
    public function createOrUpdateRole($data);

    /**
     * get all role with permission igger loading
     *
     * @return array
     */
    public function getAllRoleWithPermission();

    /**
     * get 1 role with permission igger loading
     *
     * @param $id
     * @return array
     */
    public function getRoleByIdWithPermission($id);

    /**
     * update role permission relationship
     *
     * @param $roleId
     * @param $array_permission_id
     * @return array
     */
    public function updateRolePermission($roleId, Array $array_permission_id = array());

}
