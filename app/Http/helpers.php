<?php

use App\Models\Permission;

if (!function_exists('checkExistPermissionArray')) {

    /**
     * check permission array is exist in database.
     *
     * @param array $permissionArray
     * @return boolean
     */
    function checkExistPermissionArray(Array $permissionArray)
    {
        if(count($permissionArray) === Permission::whereIn('id', $permissionArray)->count()){
            return true;
        }

        return false;
    }
}
