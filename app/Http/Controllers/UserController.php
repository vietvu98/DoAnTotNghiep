<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();


class UserController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('/admin');
        }
        else{
          return redirect('/loginadmin')->send();
        }
    }
    public function them_user()
    {
        $this->AuthLogin();
        $quyen = DB::table('quyen')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.add_user')->with('quyen',$quyen)->with('ct_quyen',$ct_quyen);
    }
    public function save_user(Request $request)
    {
        $this->AuthLogin();
        $tentkk = $request->txtUser;
        $kiemtra = DB::table('tk_quanly')->where('tentk',$tentkk)->first();
        if($kiemtra){
            Session::put('message',"User này đã tồn tại");
            return redirect('/all-user');
        }
        else {
            $data = array();
            $data['tentk'] = $request->txtUser;
            $data['matkhau'] = $request->txtPassword;
            DB::table('tk_quanly')->insert($data);
            Session::put('message',"Thêm thành công");
            return redirect('/all-user');
        }

    }

    public function all_user(Request $request)
    {
        $this->AuthLogin();
        $data_user = DB::table('tk_quanly')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.all_user')->with('all_user',$data_user)->with('ct_quyen',$ct_quyen);

    }
    public function delete_user($matk)
    {
        $this->AuthLogin();
        DB::table('tk_quanly')->where('matk',$matk)->delete();
        Session::put('message',"Xoá thành công");
        return redirect('/all-user');
    }

    public function capquyen(){
        $this->AuthLogin();
        $matk = Session::get('admin_id');
        $quyen = DB::table('quyen')->get();
        $taikhoan =DB::table('tk_quanly')->get();
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        $chitiet_quyen = DB::table('chitiet_quyen')->get();
        return view('adminpages.capquyen')->with('quyen',$quyen)->with('ct_quyen',$ct_quyen)
        ->with('taikhoan',$taikhoan)->with('chitiet_quyen',$chitiet_quyen);
    }
    public function luuquyen(Request $request)
    {
        $this->AuthLogin();
        $hid = $request->hid;
        $temp = 0;
            if($temp == 0){
                DB::table('chitiet_quyen')->where('matk',$hid)->delete();
                $temp = 1;
            }
            if($temp = 1){
                foreach($request->input('ck') as $key => $values){
                    $datainsert = array();
                    $datainsert['matk'] = $request->hid;
                    $datainsert['idquyen'] = $values;
                    DB::table('chitiet_quyen')->insert($datainsert);
                }
                // DB::table('chitiet_quyen')->insert($data);
                Session::put('message',"Thêm thành công");
                return redirect('/capquyen');
            }
        }

}
