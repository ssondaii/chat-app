<?php
namespace App\Repositories\permission;

use App\Models\Permission;
use App\Repositories\EloquentRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PermissionEloquentRepository extends EloquentRepository implements PermissionRepositoryInterface {

    public function getModel()
    {
        return Permission::class;
    }

    public function createOrUpdatePermission($data)
    {
        Permission::updateOrCreate(
            [
                'id'            => $data['permissionId'],
            ],
            [
                'name'          => $data['permissionName'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        );
    }
}
