<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function getLogin(){
    	return view('admin.dangnhap');
    }
    public function postLogin(Request $req){
    	$this->validate($req,
    		[
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
            $credentials = array('email'=>$req->email,'password'=>$req->password,'authority'=>1);
            if(Auth::attempt($credentials)){
           		 return redirect('admin/index');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Tài khoản hoặc mật khẩu chưa đúng']);
            }

    }
    public function getIndex(){
    	return view('admin.layout.index');
    }
}
