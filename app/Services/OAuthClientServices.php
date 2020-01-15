<?php
namespace App\Services;

use App\Repositories\OAuthClient\OAuthClientRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OAuthClientServices{

    const DEFAULT_PERSONAL_ACCESS_CLIENT = 0;
    const DEFAULT_PASSWORD_CLIENT = 0;
    const DEFAULT_REVOKED_TRUE = 0;
    const DEFAULT_REVOKED_FALSE = 1;

    protected $oauthRepo;

    public function __construct(OAuthClientRepositoryInterface $repository){
        $this->oauthRepo = $repository;
    }

    /**
     * get all client.
     *
     * @param $perPage
     * @return array
     */
    public function getAllClient($perPage){
        return $this->oauthRepo->getAllOAuthClientWithPagination($perPage);
    }

    /**
     * create new client.
     * @param $data
     * @return boolean
     */
    public function createNewClient($data){
        $obj = [
            'user_id'                   => Auth::id(),
            'name'                      => $data['clientName'],
            'secret'                    => Str::random(40),//,bcrypt(uniqid()),
            'redirect'                  => $data['clientUrl'],
            'personal_access_client'    => self::DEFAULT_PERSONAL_ACCESS_CLIENT,
            'password_client'           => self::DEFAULT_PASSWORD_CLIENT,
            'revoked'                   => self::DEFAULT_REVOKED_TRUE,
            'created_at'                => Carbon::now(),
            'updated_at'                => Carbon::now(),
        ];

        DB::beginTransaction();
        try {
            $this->oauthRepo->create($obj);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * update a client.
     * @param $data
     * @return boolean
     */
    public function updateClient($data){
        $id     = $data['clientIdEdit'];
        $obj    = [
            'name'          =>  $data['clientNameEdit'],
            'redirect'      =>  $data['clientUrlEdit'],
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

    /**
     * delete a client.
     * @param $data
     * @return boolean
     */
    public function deleteClient($data){
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
