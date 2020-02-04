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

    protected $permissionService;

    public function __construct(PermissionService $service){
        $this->permissionService = $service;
    }

    /**
     * get all permissions and return to view
     *
     * @return Response
     */
    public function index(){
        return view('admin/permissions.index', [
            'permissions' => $this->permissionService->getAllPermission()
        ]);
    }

    /**
     * Store a permission.
     *
     * @param Request $request
     * @return Response
     */
    public function store(CreateOrUpdatePermissionRequest $request){
        $data = $request->all();

        if($this->permissionService->createOrUpdatePermission($data)){
            return redirect()->route('admin.permissions.index')->with('status', 1);
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

        if($this->permissionService->deletePermission($data)){
            return redirect()->route('admin.permissions.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }
}
