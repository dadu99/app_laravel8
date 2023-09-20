<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
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

        $mess = 'User' . $request->name . 'was registered in database. User email is not validated!!!';

        if ($request->verified == 1) {
            $user->email_verified_at = now();
            $mess = 'User' . $request->name . 'was registered in database. User email is validated!!!';
        }

        $user->save();
        return redirect(route('users'))->with('success', $mess);
    }
    public function editForm($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users-edit')->with('user', $user);
    }

    function updateUser(UpdateUserRequest $request, $id)
    {

        $this->validate(
            $request,
            [
                'email' => 'unique:users,email,' . $id
            ],
            [
                'email.unique' => 'This mail is already in data base'
            ]
        );

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

        $mess = 'User data was updated';

        //verified email
        if ($request->verified == 'valid') {
            $user->email_verified_at = now();
            $mess = "User data was updated and mail was validated!";
        }

        if ($request->verified == 'invalid') {
            $user->email_verified_at = null;
            $mess = "User data was updated and mail was INVALIDATED!";
        }

        if ($request->verified == 'send') {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            $mess = "User data was updated and mail was INVALIDATED and was send a notification via email!";
        }

        $user->save();
        return redirect(route('users'))->with('success', $mess);
    }
}
