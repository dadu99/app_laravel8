<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }
    public function showUsers()
    {

        $users = User::all()->sortBy('name');

        return view('admin.users')->with('users', $users);
    }
    public function newUser()
    {

        return view('admin.users-new');
    }
    public function createUser(CreateUserRequest $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect(route('users'));
    }
}
