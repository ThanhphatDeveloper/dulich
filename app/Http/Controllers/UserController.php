<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //Phương thức hỗ trợ load hình và thay thế bằng hình mặc định nếu ko tìm thấy file
    protected function fixImage(User $u)
    {
        //1 hình bất kì để vào folder public/img
        if($u->image && Storage::disk('public')->exists($u->image)){
            $u->image = Storage::url($u->image);
        } else{
            $u->image = '/img/test.gif';
        }
    }

    public function index()
    {
        $lst_users=User::all();
        foreach($lst_users as $u){
            $this->fixImage($u);
        }
        return view('users.user-index', ['lst'=>$lst_users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->fixImage($user);
        // if($request->expectsJson()){
        //     return $user;
        // }
        //dd($product);
        return view('users.user-show', ['u'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
