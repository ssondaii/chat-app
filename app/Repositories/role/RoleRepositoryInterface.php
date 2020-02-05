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
     * get role with permission igger loading
     *
     * @return array
     */
    public function getRoleWithPermission();

}
