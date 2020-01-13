<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\User;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface{

    public function getModel()
    {
        return User::class;
    }

}
