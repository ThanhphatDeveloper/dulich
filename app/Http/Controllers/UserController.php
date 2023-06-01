<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $lst_users=User::all();
        return view('users.user-index', ['lst'=>$lst_users]);
    }
}
