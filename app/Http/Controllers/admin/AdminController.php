<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dasboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', ['roles' => $roles]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'role_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',

        ]);

        $user = new User();
        $user->role_id = $request->role_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->save();
    }
}