<?php
namespace App\Repositories\permission;

interface PermissionRepositoryInterface{

    public function createOrUpdateRole($data, $isAdmin);

}
