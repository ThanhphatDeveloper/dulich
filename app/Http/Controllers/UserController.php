<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
        //$lst_users=User::all();
        $lst_users=User::paginate(10);
        //dd($lst_users);
        foreach($lst_users as $u){
            $this->fixImage($u);
        }
        return view('admin.users.user-index', ['lst'=>$lst_users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.user-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(Hash::make($request->password));

        $u = new User;
        $u->ho = $request->ho;
        $u->ten = $request->ten;
        $u->email = $request->email;
        $u->sdt = $request->sdt;
        $u->email_verified_at = Carbon::now()->toDateTimeString();
        $u->password = Hash::make($request->password);
        $u->admin = $request->admin;
        $u->trangthai = 1;

        // $u = User::create([
        //     'ho'=>$request->ho,
        //     'ten'=>$request->ten,
        //     'email'=>$request->email,
        //     'sdt'=>$request->sdt,
        //     'email_verified_at'=>Carbon::now()->toDateTimeString(),
        //     'password'=>Hash::make($request->password),
        //     'admin'=>$request->admin,
        //     'trangthai'=>1,
        //     'image'=>''
        // ]);

        $path = $request->image->store('upload/user/'.$u->id,'public');
        $u->image=$path;
        $u->save();
        return redirect()->route('users.index');
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
        return view('admin.users.user-show', ['u'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //dd($user);
        return view('admin.users.user-edit', ['u'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $path = $user->image;
        if($request->hasFile('image') && $request->image->isValid()){
            $path = $request->image->store('upload/user/'.$user->id, 'public');
        }

        User::where('id', $user->id)->update([
            'ho'=>$request->ho,
            'ten'=>$request->ten,
            'email'=>$request->email,
            'sdt'=>$request->sdt,
            'password'=>Hash::make($request->password),
            'admin'=>$request->admin,
            'trangthai'=>$request->trangthai,
            'image'=>$path
        ]);

        $u=User::where('id', $user->id)->get();
        //dd($u);
        return redirect()->route('users.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->fill([
            'trangthai'=> 0,
        ]);
        $user->save();
        $user->delete();
        return redirect()->route('users.index');
    }
}
