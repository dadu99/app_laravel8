<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showProfile()
    {
        $user = User::findOrFail(auth()->user()->id);
        return view('admin.user-profile')->with('user', $user);
    }
    function updateProfile(UpdateUserRequest $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'unique:users,email,' . auth()->user()->id
            ],
            [
                'email.unique' => 'This mail is already in data base'
            ]
        );


        $user = User::findOrFail(auth()->user()->id);

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

        $user->save();
        return redirect(route('dashboard'));
    }
    public function resetPassword(ResetPasswordRequest $request)
    {

        if (Auth::attempt(['email' => auth()->user()->email, 'password' => $request->password])) {

            //creem noua parola criptata
            $newPassword = bcrypt($request->passwordnew);
            $user = User::findOrFail(auth()->user()->id);
            $user->password = $newPassword;

            $user->save();

            return redirect()->back()->with('user_message', 'Parola a fost modificata cu succes. Noua parola pentru acest cont este <strong>' . $request->passwordnew . '</strong>. <br> Notati aceasta parola intr-un loc sigur.');
        }
    }
}
