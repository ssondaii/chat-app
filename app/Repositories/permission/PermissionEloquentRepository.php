<?php
namespace App\Repositories\permission;

use App\Repositories\EloquentRepository;
use App\Models\Role;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PermissionEloquentRepository extends EloquentRepository implements PermissionRepositoryInterface {

    public function getModel()
    {
        return Role::class;
    }

    public function createOrUpdateRole($data, $isAdmin)
    {
        Role::updateOrCreate(
            [
                'id'            => $data['roleId'],
            ],
            [
                'name'          => $data['roleName'],
                'isAdmin'       => $isAdmin,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        );
    }
}
