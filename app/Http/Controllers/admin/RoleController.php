<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {

        $roles = Role::all();
        return view('admin.role.index', ['roles' => $roles]);
    }

    public function create()
    {
        $modules = Module::all();
        return view('admin.role.create', ['modules' => $modules]);
    }

    public function store(Request $request)
    {
        // return $request->permission;
        $role = Role::create([
            'name' => $request->name,
        ]);


        $permissions = $request->permissions;
        foreach ($permissions as $data) {

            $role->permissions()->attach($data);
        }

        // foreach ($permissions as $data) {

        //     $permission = Permission::create([
        //         'module_id' => $request->module,
        //         'name'      => $data
        //     ]);
        //     $role->permissions()->attach($data);
        // }
    }

    public function module_create()
    {
        return view('admin.module.create');
    }
    public function module_store(Request $request)
    {
        $module = Module::create([
            'name' => $request->name
        ]);

        $permissions = $request->permissions;
        // return $permissions;

        foreach ($permissions as $data) {
            $module->permissions()->create([
                'module_id' => $module->id,
                'name' => $data
            ]);
        }
    }
}