<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class HomesController extends Controller
{
    public function getAdminHome() {
    	return view('backend.index');
    }

    public function getProfile() {
    	return view('backend.setting.profile');
    }

    public function getLogin() {
    	return view('backend.login');
    }

    public function postLogin(Request $request) {
    	$rules = [
            'email'=>'required|email|:6|max:255',
            'password'=>'required|min:6|max:255'
        ];
        $messages = [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Không được vượt quá 255 ký tự',
            'email.min' => 'Không được nhỏ quá 5 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.max' => 'Mật khẩu không được vượt quá 255 ký tự',
            'password.min' => 'Mật khẩu không được nhỏ hơn 5 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->passes()) {
            $arr = [
                'email'=>$request->email, 
                'password'=>$request->password, 
                'level'=>1,
            ];
            if(Auth::attempt($arr)) {
                return redirect()->intended('admin');
            } else {
                return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không hợp lệ!!!!');
            }
        } else {
            return view('frontend.account', ['errors'=>$validator->errors()->all()]);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->intended('quantri/login');
    }
}
