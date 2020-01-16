<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\CreateOrUpdateUserRequest;
use Illuminate\Http\Request;
use App\Services\UserServices;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServices $services){
        $this->userService = $services;
    }

    /**
     * Get all user and return to view.
     * @return array
     */
    public function index()
    {
        return view('admin/users.index',[
            'users' => $this->userService->getAllUser()
        ]);
    }

    /**
     * Store a user
     *
     * @param  $request
     * @return array
     */
    public function store(CreateOrUpdateUserRequest $request)
    {
        $data = $request->all();

        if($this->userService->createOrUpdateUser($data)){
            return redirect()->route('admin.users.index')->with('status', 1);
        }
        return redirect()->back()->with('status', -1);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
