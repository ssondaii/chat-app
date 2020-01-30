<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\Role\CreateOrUpdateRoleRequest;
use App\Http\Requests\Role\UpdateRoleAdminRequest;
use App\Http\Requests\Role\DeleteRoleRequest;
use Illuminate\Http\Response;

class RoleController extends Controller
{

    protected $roleService;

    public function __construct(RoleService $service){
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
    public function store(CreateOrUpdateRoleRequest $request){
        $data = $request->all();

        if($this->roleService->createOrUpdateRole($data)){
            return redirect()->route('admin.roles.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

    /**
     * update admin role.
     *
     * @param Request $request
     * @return boolean
     */
    public function updateRoleAdmin(UpdateRoleAdminRequest $request){
        $data = $request->all();

        if($this->roleService->updateRoleAdmin($data)){
            return 1;
        }
        return -1;
    }

    /**
     * delete role
     *
     * @param Request $request
     * @return void
     */
    public function delete(DeleteRoleRequest $request)
    {
        $data = $request->all();

        if($this->roleService->deleteRole($data)){
            return redirect()->route('admin.roles.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }
}
