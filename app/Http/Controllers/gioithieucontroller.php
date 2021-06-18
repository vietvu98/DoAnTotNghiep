<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Social;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use  App\Models\taikhoan as ModelsTaikhoan;
use Illuminate\Support\Facades\Validator;
use App\Models\taikhoan;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

session_start();


class gioithieucontroller extends Controller
{

    public function trangchu()
    {
        $data = DB::table('daotao')->get();
        return view('userpages.trangchu')->with('all_daotao',$data);

    }
    public function gioithieu()
    {
        $data = DB::table('daotao')->get();
        return view('userpages.gioithieu')->with('all_daotao',$data);
    }
    public function dangnhap()
    {
        Session::put('previous_url',URL::previous());
        return view('userpages.dangnhapuser');
    }

    public function dangnhaptc(Request $request)
    {
        $data = $request->all();
        $tentk = $request->tentk;
        $matkhau = md5($request->matkhau);

        $result = ModelsTaikhoan::where('tentk', $tentk)->where('matkhau', $matkhau)->first();
        $login_count = $result->count();
        if ($login_count) {
            Session::put('tentk_user', $result->tentk);
            Session::put('matk_user', $result->matk);


            // return redirect('/gt');
            //session(['link' => url()->previous()]);

            return redirect(Session::get('previous_url'));

        } else {
            Session::put('message', 'Mật khẩu tài khoản bị sai. Vui lòng nhập lại!');
            return redirect('/dangnhap');
        }

    }
        //Login facabook
        public function login_facebook(){
            return Socialite::driver('facebook')->redirect();
        }

        public function callback_facebook(){
            $provider = Socialite::driver('facebook')->user();
            $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
            if($account){
                //login in vao trang quan tri
                $account_name = ModelsTaikhoan::where('matk',$account->user)->first();
                Session::put('tentk_user',$account_name->tentk);
                Session::put('matk_user',$account_name->matk_user);
                return redirect('/gt')->with('message', 'Đăng nhập Admin thành công');
                // return $account_name
            }else{

                $fb = new Social([
                    'provider_user_id' => $provider->getId(),
                    'provider' => 'facebook'
                ]);

                $orang = ModelsTaikhoan::where('email',$provider->getEmail())->first();

                if(!$orang){
                    $orang = ModelsTaikhoan::create([
                        'tentk' => $provider->getName(),
                        'email' => $provider->getEmail(),
                        'matkhau' => '',
                        'tk_token' =>'',
                    ]);
                }
                $fb->login()->associate($orang);
                $fb->save();

                $account_name = ModelsTaikhoan::where('matk',$account->user)->first();

                Session::put('tentk_user',$account_name->tentk_user);
                 Session::put('matk_user',$account_name->matk_user);
            }
            return redirect('/gt')->with('message', 'Đăng nhập Admin thành công');

        }
    public function dangxuat()
    {
        Session::put('tentk_user', null);
        Session::put('matk_user', null);
        return redirect('/gt');
    }
    public function forgotpassword(){
        return view('userpages.forgotpassword');
    }
    public function recover_password(Request $request){
        $validation = Validator::make($request->all(),[
            'email' => 'required'
        ]);
        if($validation->fails()){
            return redirect()->back()->withErrors('Bạn chưa nhập email');
        }
        else{
            $email = taikhoan::where('email',$request->email)->first();
            if(empty('$email')){
                return redirect()->back()->with('error','Email không tồn tại');
            }
            else{
                $password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,6);
                $newpassword['matkhau'] = md5($password);
                $updatepassword = taikhoan::where('email',$request->email)->update($newpassword);

                $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
                $title = "Lấy lại mật khẩu".' '.$now;
                $email = $email->email;
                $data = array("name"=>$title,"body"=>$password,'email'=>$email);
                Mail::send('/userpages.forget_pass_notify', ['data'=>$data], function ($message) use ($title,$data){
                    $message->to($data['email'])->subject($title);
                    $message->from(env('MAIL_USERNAME'),$title);
                });
                return redirect()->back()->with('message','Gửi thành công');
            }

        }
    }
}
