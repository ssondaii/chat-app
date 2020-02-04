<?php
namespace App\Services;

use App\Models\Permission;
use App\Repositories\permission\PermissionRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionService{

    protected $perRepo;

    public function __construct(PermissionRepositoryInterface $repository){
        $this->perRepo = $repository;
    }

    /**
     * get all permission.
     *
     * @return array
     */
    public function getAllPermission(){
        return $this->perRepo->getAll();
    }

    /**
     * create or update permission.
     * @param $data
     * @return boolean
     */
    public function createOrUpdatePermission($data){

        DB::beginTransaction();
        try {
            $this->perRepo->createOrUpdatePermission($data);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * delete a permission.
     * @param $data
     * @return boolean
     */
    public function deletePermission($data){

        DB::beginTransaction();
        try {
            $this->perRepo->delete($data['permissionId']);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

}
