<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Facades\RoleRepository;
use App\Facades\PermissionRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Flash;

class RoleController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the role list
     *
     * @return Response
     */
    public function index()
    {
        
    	$roles = RoleRepository::paginate();
        $links = RoleRepository::links();
        return View::make('admin.role_index',['roles'=> $roles,'links'=>$links]);
    }

    public function create()
    {
        $pems = PermissionRepository::all();
        return View::make('admin.role_create',['pems'=>$pems]);
    }

    public function store(Request $request)
    {
        
        $input = $request->only(['name','display_name','description']);
        $val = RoleRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            return Redirect::route('admin.roles.create')->withInput()->withErrors($val->errors());
        }

        $role = RoleRepository::create($input);
        if($request->has('permissions')) {
            $pem_ids = $request->input('permissions');
            $pems = PermissionRepository::find($pem_ids);
            foreach ($pems as $pem) {
                $role->attachPermission($pem);
            }
        }
        Flash::success('新的角色 "'.$role->name.'" 已成功创建！');
        return Redirect::route('admin.roles.index');
    }

    public function show($id)
    {
        $role = RoleRepository::find($id);
        $pems = $role->perms()->get();
        
        
        
        return View::make('admin.role_show',['role'=>$role,'pems'=>$pems]);
    }

    public function edit($id)
    {
        $role = RoleRepository::find($id);
        $perms = PermissionRepository::all();
        $perms_selected = $role->perms()->select('id')->get()->toArray();
        $perms_selected_ids = array_column($perms_selected,'id');
        return View::make('admin.role_edit',['role'=>$role,'perms'=>$perms,'perms_selected_ids'=>$perms_selected_ids]);
    }

    public function update($id,Request $request)
    {
        $input = $request->only(['name','display_name','description']);
        $val = RoleRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            return Redirect::route('admin.roles.edit')->withInput()->withErrors($val->errors());
        }

        $role = RoleRepository::find($id);
        $role->perms()->detach();
        
        if($request->has('permissions')) {
            $pem_ids = $request->input('permissions');
            $pems = PermissionRepository::find($pem_ids);
            foreach ($pems as $pem) {
                $role->attachPermission($pem);
            }
        }
        $role->name = $input['name'];
        $role->display_name = $input['display_name'];
        $role->description = $input['description'];
        $role->save();
        Flash::success('角色 "'.$role->name.'" 已成功更新！');
        return Redirect::route('admin.roles.index');


    }

}
