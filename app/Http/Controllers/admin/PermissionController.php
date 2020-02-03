<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Requests\permission\CreateOrUpdatePermissionRequest;
use App\Http\Requests\permission\DeletePermissionRequest;
use Illuminate\Http\Response;

class PermissionController extends Controller
{

    protected $roleService;

    public function __construct(PermissionService $service){
        $this->roleService = $service;
    }

    /**
     * get all roles and return to view
     *
     * @return Response
     */
    public function index(){
        return view('admin/roles.index', [
            'roles' => $this->roleService->getAllRole()
        ]);
    }

    /**
     * Store a role.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateOrUpdatePermissionRequest $request){
        $data = $request->all();

        if($this->roleService->createOrUpdateRole($data)){
            return redirect()->route('admin.roles.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

    /**
     * delete role
     *
     * @param Request $request
     * @return void
     */
    public function delete(DeletePermissionRequest $request)
    {
        $data = $request->all();

        if($this->roleService->deleteRole($data)){
            return redirect()->route('admin.roles.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }
}
