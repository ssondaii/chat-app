<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\Role\CreateOrUpdateRoleRequest;
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
    public function index()
    {
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
    public function store(CreateOrUpdateRoleRequest $request)
    {
        $data = $request->all();

        if($this->roleService->createOrUpdateRole($data)){
            return redirect()->route('admin.roles.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

}
