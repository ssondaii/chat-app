<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServices{

    protected $userRepo;

    public function __construct(UserRepositoryInterface $repository){
        $this->userRepo = $repository;
    }

    /**
     * get all user.
     *
     * @return array
     */
    public function getAllUser(){
        return $this->userRepo->getAll();
    }

    /**
    * create user.
    * @param $data
    * @return boolean
    */
    public function createOrUpdateUser($data){

        DB::beginTransaction();
        try {
            $this->userRepo->createOrUpdateUser($data);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * delete a client.
     * @param $data
     * @return boolean
     */
    public function deleteUser($data){
        $id = $data['clientIdDelete'];

        $obj    = [
            'revoked'       => self::DEFAULT_REVOKED_FALSE,
            'updated_at'    => Carbon::now(),
        ];

        DB::beginTransaction();
        try {
            $this->oauthRepo->update($id, $obj);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

}
