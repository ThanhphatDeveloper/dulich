<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
    public function showForm(){
        return view('login.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $trangthai = User::where('email', '=', $request->email)->first();

        if($trangthai->trangthai == 0){
            $request->validate(
                [
                    'trangthai' => ['required']
                ],
                [
                    'trangthai.required' => 'Đăng nhập không hợp lệ'
                ]
            );
        }

        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ],
            [
                'email.required' => 'Đăng nhập không hợp lệ',
                'email.email' => 'Đăng nhập không hợp lệ',
                'password.required' => 'Đăng nhập không hợp lệ',
            ]
        );
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin/statistic');
        }
 
        return back()->withErrors([
            'email' => 'Đăng nhập không hợp lệ'
        ])->onlyInput('email');
    }

        
    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/admin/login');
    }
}