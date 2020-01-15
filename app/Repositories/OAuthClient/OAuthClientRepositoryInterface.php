<?php
namespace App\Repositories\OAuthClient;

interface OAuthClientRepositoryInterface{

    /**
     * Get All client where revoked = 0
     * @return array
     */
    public function getAllOAuthClient();

    /**
     * Get All client where revoked = 0 with pagination
     * @param $perPage
     * @return array
     */
    public function getAllOAuthClientWithPagination($perPage);
}
