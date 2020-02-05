<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\Role\CreateOrUpdateRoleRequest;
use App\Http\Requests\Role\DeleteRoleRequest;
use Illuminate\Http\Response;
use App\Models\Permission;

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
            'roles'     => $this->roleService->getAllRole(),
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
     * get role permission.
     *
     * @param DeleteRoleRequest $request
     * @return void
     */
    public function editRolePermission(DeleteRoleRequest $request){

        return view('admin/roles.config_role_permission', [
            'roles'         => $this->roleService->getAllRole(),
            'permissions'   => Permission::all(),
        ]);
    }

    /**
     * update role permission.
     *
     * @param Request $request
     * @return boolean
     */
    public function updateRolePermission(Request $request){
        dd(2);
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
