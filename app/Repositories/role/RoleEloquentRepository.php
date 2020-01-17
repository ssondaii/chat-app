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

    public function createOrUpdateRole($data)
    {
        Role::updateOrCreate(
            [
                'id'            => $data['userId'],
            ],
            [
                'email'         => $data['userEmail'],
                'name'          => $data['userName'],
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        );
    }
}
