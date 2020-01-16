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

    public function createOrUpdateUser($data, $id)
    {
        User::updateOrCreate(
            [
                'id'            => $id,
                'email'         => $data['userEmail'],
            ],
            [
                'name'          => $data['userName'],
                'password'      => Hash::make('12345678'),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]
        );
    }
}
