<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserServices;

class UserController extends Controller
{
    const CLIENT_PER_PAGE = 5;

    protected $userService;

    public function __construct(UserServices $service){
        $this->userService = $service;
    }

    /**
     * Get all clients and return to view.
     * @return array
     */
    public function index(){
        return view('admin/users.index',[
            'users' => $this->userService->getAllUser()
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
