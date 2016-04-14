<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use App\Facades\PermissionRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class PermissionController extends Controller
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
        
    	$pems = PermissionRepository::all();

        return View::make('admin.pem_index',['pems'=> $pems]);
    }

    public function create()
    {
        return View::make('admin.pem_create');
    }

    public function store(Request $request)
    {
        

        $input = $request->only(['name','display_name','description']);
        $val = PermissionRepository::validate($input, array_keys($input));
        if ($val->fails()) {
            return Redirect::route('admin.pems.create')->withInput()->withErrors($val->errors());
        }

        $pem = PermissionRepository::create($input);

        return Redirect::route('admin.pems.index')->with('success', '新的权限 "'.$input['name'].'" 已成功创建！');
    }

}
