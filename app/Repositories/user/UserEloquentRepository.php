<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface{

    public function getModel()
    {
        return User::class;
    }

    public function createOrUpdateUser($data)
    {
        User::updateOrCreate(
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
