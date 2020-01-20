<?php
namespace App\Repositories\role;

interface RoleRepositoryInterface{

    public function createOrUpdateRole($data, $isAdmin);

}
