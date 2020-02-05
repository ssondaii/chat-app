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
     * get role with permission igger loading
     *
     * @return array
     */
    public function getRoleWithPermission()
    {
        return $this->_model::with('permissions')->get();
    }
}
