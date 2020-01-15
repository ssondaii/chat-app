<?php
namespace App\Repositories\OAuthClient;

use App\Repositories\EloquentRepository;
use App\Repositories\OAuthClient\OAuthClientRepositoryInterface;
use App\Models\OAuthClient;

class OAuthClientEloquentRepository extends EloquentRepository implements OAuthClientRepositoryInterface{

    public function getModel()
    {
        return OAuthClient::class;
    }

    /**
     * Get All client where revoked = 0
     * @return array
     */
    public function getAllOAuthClient()
    {
        $listOAuthClient = [];

        $base = $this->_model::where('revoked', '=', '0')
            ->orderBy('name', 'asc')
            ->get();

        if(count($base) > 0){
            $listOAuthClient = $base;
        }

        return $listOAuthClient;
    }

    /**
     * Get All client where revoked = 0 with pagination
     * @param $perPage
     * @return array
     */
    public function getAllOAuthClientWithPagination($perPage)
    {
        $listOAuthClient = [];

        $base = $this->_model::where('revoked', '=', '0')
            ->orderBy('name', 'asc')
            ->paginate($perPage);

        if(count($base) > 0){
            $listOAuthClient = $base;
        }

        return $listOAuthClient;
    }
}
