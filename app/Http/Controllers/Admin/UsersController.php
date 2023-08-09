<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct() {

        $this->middleware('admin');
        
    }
    public function showUsers() {

        $users = User::all()->sortBy('name');

        return view('admin.users')->with('users', $users);
    }
}
