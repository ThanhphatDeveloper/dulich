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
        $lst_users=User::search()->where('id','!=', 1)->orderBy('updated_at','DESC')->paginate(10);

        foreach($lst_users as $u){
            $this->fixImage($u);
        }

        return view('admin.users.user-index', compact('lst_users'));
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
        $request->validate(
            [
                'ho' => ['required', 'max:50'],
                'ten' => ['required', 'max:20'],
                'email' => ['required', 'unique:users', 'email',],
                'sdt' => ['required', 'unique:users', 'max:10', 'min:10'],
                'password' => ['required'],
                'image' => ['required', 'mimes:jpg,png,bmp,gif'],
            ],
            [
                'ho.required' => 'Họ không được để trống',
                'ho.max' => 'Họ tối đa 50 ký tự',
                'ten.required' => 'Tên không được để trống',
                'ten.max' => 'Tên tối đa 20 ký tự',
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã tồn tại',
                'email.email' => 'Email không đúng định dạng',
                'sdt.required' => 'Số điện thoại không được để trống',
                'sdt.unique' => 'Số điện thoại đã tồn tại',
                'sdt.max' => 'Số điện thoại không hợp lệ',
                'sdt.min' => 'Số điện thoại không hợp lệ',
                'password.required' => 'Mật khẩu không được để trống',
                'image.required' => 'Ảnh đại diện chưa được chọn',
                'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)',
            ]
        );

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
        if($request->restore == 1){
            User::where('id', $user->id)->update([
                'trangthai'=>1
            ]);

            return redirect()->route('users.index');
        }
        
        if($request->user_update === 'user_update_pass'){
            $request->validate(
                [
                    'password' => ['required'],
                ],
                [
                    'password.required' => 'Mật khẩu không được để trống',
                ]
            );
            User::where('id', $user->id)->update([
                'password'=>Hash::make($request->password)
            ]);
            return redirect('/admin/home');
        }

        $path = $user->image;
        if($request->hasFile('image') && $request->image->isValid()){
            $path = $request->image->store('upload/user/'.$user->id, 'public');
        }

        if($request->user_update === 'user_update_info'){
            $request->validate(
                [
                    'ho' => ['required', 'max:50'],
                    'ten' => ['required', 'max:20'],
                    'image' => ['mimes:jpg,png,bmp,gif'],
                ],
                [
                    'ho.required' => 'Họ không được để trống',
                    'ho.max' => 'Họ tối đa 50 ký tự',
                    'ten.required' => 'Tên không được để trống',
                    'ten.max' => 'Tên tối đa 20 ký tự',
                    'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)',
                ]
            );
            User::where('id', $user->id)->update([
                'ho'=>$request->ho,
                'ten'=>$request->ten,
                'image'=>$path
            ]);
            return redirect('/admin/home');
        }

        $request->validate(
            [
                'ho' => ['required', 'max:50'],
                'ten' => ['required', 'max:20'],
                'email' => ['required', 'email',],
                'sdt' => ['required'],
                'password' => ['required'],
                'image' => ['mimes:jpg,png,bmp,gif'],
            ],
            [
                'ho.required' => 'Họ không được để trống',
                'ho.max' => 'Họ tối đa 50 ký tự',
                'ten.required' => 'Tên không được để trống',
                'ten.max' => 'Tên tối đa 20 ký tự',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'sdt.required' => 'Số điện thoại không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'image.mimes' => 'Định dạng ảnh không hợp lệ (định dạng hợp lệ: jpg, png, bmp, gif)',
            ]
        );

        if( $request->email != $user->email){
            $request->validate(
                [
                    'email' => ['unique:users'],
                ],
                [
                    'email.unique' => 'Email đã tồn tại'
                ]
            );
        }

        if( $request->sdt != $user->sdt){
            $request->validate(
                [
                    'sdt' => ['unique:users'],
                ],
                [
                    'sdt.unique' => 'Số diện thoại đã tồn tại'
                ]
            );
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

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        User::where('id', $user->id)->update([
            'trangthai'=> 0,
            'thoigianxoa'=>Carbon::now()->toDateTimeString(),
        ]);
        //dd($user);
        $user->save();
        return redirect()->route('users.index');
    }
}
