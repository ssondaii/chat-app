<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OAuthClient\CreateOAuthClientRequest;
use App\Http\Requests\OAuthClient\EditOAuthClientRequest;
use App\Http\Requests\OAuthClient\DeleteOAuthClientRequest;
use App\Services\OAuthClientServices;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    const CLIENT_PER_PAGE = 5;

    protected $oauthService;

    public function __construct(OAuthClientServices $service){
        $this->oauthService = $service;
    }

    /**
     * Get all clients and return to view.
     * @return array
     */
    public function index(){

        return view('admin/clients.index',[
            'clients' => $this->oauthService->getAllClient(self::CLIENT_PER_PAGE)
        ]);
    }

    /**
     * validate param and create new clients then return to view.
     * @param $request
     * @return boolean
     */
    public function store(CreateOAuthClientRequest $request){
        $data = $request->all();

        if($this->oauthService->createNewClient($data)){
            return redirect()->route('admin.clients.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

    /**
     * validate param and edit clients then return to view.
     * @param $request
     * @return boolean
     */
    public function update(EditOAuthClientRequest $request){
        $data = $request->all();

        if($this->oauthService->updateClient($data)){
            return redirect()->route('admin.clients.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

    /**
     * validate param and delete clients then return to view.
     * @param $request
     * @return boolean
     */
    public function delete(DeleteOAuthClientRequest $request){
        $data = $request->all();

        if($this->oauthService->deleteClient($data)){
            return redirect()->route('admin.clients.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }
}
