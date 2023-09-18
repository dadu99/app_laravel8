<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

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

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;
        }

        $user->save();

        return redirect(route('users'));
    }
    public function editForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users-edit')->with('user', $user);
    }

    function updateUser(Request $request, $id)
    {

        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {

            if (!($user->photo == 'default.jpg')) {
                File::delete('images/users/' . $user->photo);
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;


        $user->save();
        return redirect(route('users'));
    }
}
