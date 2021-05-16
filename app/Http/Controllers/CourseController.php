<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


session_start();

class CourseController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect('/admin');
        } else {
            return redirect('/loginadmin')->send();
        }
    }
    public function index_admin()
    {
        $this->AuthLogin();
        return view('welcome');
    }


    public function loginadmin()
    {

        return view('adminpages.loginadmin');
    }
    public function Login(Request $request)
    {
        $tentk = $request->txtTenTK;
        $matkhau = MD5($request->txtMK);
        $result = DB::table('tk_quanly')->where('tentk', $tentk)->where('matkhau', $matkhau)->first();
        if ($result) {
            Session::put('admin_id', $result->matk);
            Session::put('tentk', $tentk);
            return redirect('/admin');
        } else {
            Session::put('message', 'Sai thông tin tài khoản. Nhập lại!');
            return redirect('/loginadmin');
        }
    }
    public function change_password()
    {
        $this->AuthLogin();
        return view('adminpages.changepassword');
    }
    public function update_password(Request $request)
    {
        $this->AuthLogin();
        $matk = Session::get('admin_id');
        $data_tk = DB::table('tk_quanly')->where('matk', $matk)->get();
        $matkhaucu = $data_tk[0]->matkhau;
        $mk = MD5($request->txtMatkhaucu);
        if ($mk == $matkhaucu) {
            $tentk = $data_tk[0]->tentk;
            $data = array();
            $data['tentk'] = $tentk;
            $data['matkhau'] = MD5($request->txtMatkhaumoi);
            DB::table('tk_quanly')->where('matk', $matk)->update($data);
            Session::put('message', 'Đổi mật khẩu thành công');
            return redirect('/admin');
        } else {
            Session::put('message', "Mật khẩu cũ sai !");
            return redirect('/change-password');
        }
    }
    public function Logout()
    {
        Session::put('admin_id', null);
        Session::put('tentk', null);
        return redirect('/loginadmin');
    }

    public function add_course()
    {
        $this->AuthLogin();
        $data_daotao = DB::table('daotao')->get();
        $manage_daotao = view('adminpages.addcourse')->with('all_daotao', $data_daotao);
        return view('welcome')->with('adminpages.addcourse', $manage_daotao);
    }
    public function save_course(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenkh'] = $request->txtTenkhoahoc;
        $data['muctieukh'] = $request->txtMuctieu;
        $data['noidunggiangday'] = $request->txtNoidung;
        $data['soluonghv'] = $request->txtSoluonghv;
        $data['lichkhaigiang'] = $request->dtLichKG;
        $data['Thoiluonghoc'] = $request->txtThoiluonghoc;
        $data['hocphi'] = $request->txtHocphi;
        $data['madaotao'] = $request->slDaotao;

        $get_image = $request->file('imgKhoaHoc');
        if ($get_image) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d-m-y--h-i-s');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $date . '_' . $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/courseimage', $new_image);
            $data['anhdaidien'] = $new_image;

            DB::table('khoahoc')->insert($data);
            Session::put('message', "Đã thêm !");
            return redirect('/all-course');
        } else {
            $data['anhdaidien'] = null;

            DB::table('khoahoc')->insert($data);
            Session::put('message', "Đã thêm !");
            return redirect('/all-course');
        }
    }
    public function edit_course($makh)
    {
        $this->AuthLogin();
        $edit_course = DB::table('khoahoc')->where('makh', $makh)->get();
        $data_daotao = DB::table('daotao')->get();
        return view('adminpages.editcourse')->with('edit_course', $edit_course)->with('all_daotao', $data_daotao);
    }
    public function all_course()
    {
        $this->AuthLogin();
        $all_course = DB::table('khoahoc')->get();
        $manager_course = view('adminpages.allcourse')->with('all_course', $all_course);
        return view('welcome')->with('adminpages.allcourse', $manager_course);
    }
    public function update_course(Request $request, $makh)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenkh'] = $request->txtTenkhoahoc;
        $data['muctieukh'] = $request->txtMuctieu;
        $data['noidunggiangday'] = $request->txtNoidung;
        $data['soluonghv'] = $request->txtSoluonghv;
        $data['lichkhaigiang'] = $request->dtLichKG;
        $data['Thoiluonghoc'] = $request->txtThoiluonghoc;
        $data['hocphi'] = $request->txtHocphi;
        $data['madaotao'] = $request->slDaotao;
        $get_image = $request->file('imgKhoaHoc');
        if ($get_image) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d-m-y--h-i-s');
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $date . '_' . $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/courseimage', $new_image);
            $data['anhdaidien'] = $new_image;
            DB::table('khoahoc')->where('makh', $makh)->update($data);
            Session::put('message', "Đã sửa !");
            return redirect('/all-course');
        }
        DB::table('khoahoc')->where('makh', $makh)->update($data);
        Session::put('message', "Đã sửa !");
        return redirect('/all-course');
    }
    public function delete_course($makh)
    {
        $this->AuthLogin();
        DB::table('khoahoc')->where('makh', $makh)->delete();
        Session::put('message', "Đã xoá !");
        return redirect('/all-course');
    }
    public function them_daotao()
    {
        $this->AuthLogin();
        return view('adminpages.add_daotao');
    }
    public function save_daotao(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tendaotao'] = $request->txtTendaotao;
        DB::table('daotao')->insert($data);
        Session::put('message', "Thêm thành công");
        return redirect('/all-daotao');
    }
    public function all_daotao()
    {
        $this->AuthLogin();
        $data = DB::table('daotao')->get();
        $manage_daotao = view('adminpages.all_daotao')->with('all_daotao', $data);
        return view('welcome')->with('adminpages.all_daotao', $manage_daotao);
    }
    public function edit_daotao($madaotao)
    {
        $this->AuthLogin();
        $data = DB::table('daotao')->where('madaotao', $madaotao)->get();
        $manage_daotao = view('adminpages.edit_daotao')->with('all_daotao', $data);
        return view('welcome')->with('adminpages.edit_daotao', $manage_daotao);
    }

    public function update_daotao(Request $request, $madaotao)
    {
        $this->AuthLogin();
        $data = array();
        $data['tendaotao'] = $request->txtTendaotao;
        DB::table('daotao')->where('madaotao', $madaotao)->update($data);
        Session::put('message', "Sửa thành công");
        return redirect('/all-daotao');
    }
    public function delete_daotao($madaotao)
    {
        $this->AuthLogin();
        DB::table('daotao')->where('madaotao', $madaotao)->delete();
        Session::put('message', "Đã xoá !");
        return redirect('/all-daotao');
    }

    //Khóa học trực tuyến
    public function khonline()
    {
        $data = DB::table('daotao')->get();
        $all_khonl = DB::table('khonl')->get();
        return view('KHonline.khoahoc_onl')->with('all_onl', $all_khonl)->with('all_daotao', $data);
    }
    public function ctkhonl()
    {
        $data = DB::table('daotao')->get();
        $ctkh_onl = DB::table('khonl')->get();
        return view('KHonline.ctkhonl')->with('ctkh_onl', $ctkh_onl)->with('all_daotao', $data);
    }
    public function add_khonl()
    {
        $this->AuthLogin();
        $data_daotao = DB::table('daotao')->get();
        $manage_daotao = view('adminpages.add_khonl')->with('all_daotao', $data_daotao);
        return view('welcome')->with('adminpages.add_khonl', $manage_daotao);
    }
    public function save_khonl(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenkh_onl'] = $request->txtTenkhoahoconl;
        $data['Mota'] = $request->txtMota;
        $data['anhdaidien'] = $request->imgKhoaHoconl;
        $data['hocphi'] = $request->txtHocphionl;
        $data['madaotao'] = $request->slDaotao;
        $get_image = $request->file('imgKhoaHoconl');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/khonlimage', $new_image);
            $data['anhdaidien'] = $new_image;

            DB::table('khonl')->insert($data);
            Session::put('message', "Đã thêm!");
            return redirect('all-khonl');
        } else {
            $data['anhdaidien'] = null;
            DB::table('khonl')->insert($data);
            Session::put('message', "Đã thêm!");
            return redirect('all-khonl');
        }
    }
    public function all_khonl()
    {
        $this->AuthLogin();
        $all_khonl = DB::table('khonl')->get();
        $manager_khonl = view('adminpages.all_khonl')->with('all_khonl', $all_khonl);
        return view('welcome')->with('adminpages.all_khonl', $manager_khonl);
    }
    public function edit_khonl($makh_onl)
    {
        $this->AuthLogin();
        $edit_khonl = DB::table('khonl')->where('makh_onl', $makh_onl)->get();
        $data_daotao = DB::table('daotao')->get();
        return view('adminpages.editkhonl')->with('edit_khonl', $edit_khonl)->with('all_daotao', $data_daotao);
    }
    public function update_khonl(Request $request, $makh_onl)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenkh_onl'] = $request->txtTenkhoahoconl;
        $data['Mota'] = $request->txtMota;
        $data['anhdaidien'] = $request->imgKhoaHoconl;
        $data['hocphi'] = $request->txtHocphionl;
        $data['madaotao'] = $request->slDaotao;
        $get_image = $request->file('imgKhoaHoconl');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/khonlimage', $new_image);

            $data['anhdaidien'] = $new_image;
            DB::table('khonl')->where('makh_onl', $makh_onl)->update($data);
            Session::put('message', "Đã sửa!");
            return redirect('all-khonl');
        }

        DB::table('khonl')->where('makh_onl', $makh_onl)->update($data);
        Session::put('message', "Đã sửa!");
        return redirect('all-khonl');
    }
    public function delete_khonl($makh_onl)
    {
        $this->AuthLogin();
        DB::table('khonl')->where('makh_onl', $makh_onl)->delete();
        Session::put('message', "Đã xoá !");
        return redirect('/all-khonl');
    }
    // Bai hoc truc tuyen

    public function add_baihoc()
    {
        $this->AuthLogin();
        $data_khonl = DB::table('khonl')->get();
        $manage_khonl = view('adminpages.addbaihoc')->with('all_khonl', $data_khonl);
        return view('welcome')->with('adminpages.addbaihoc', $manage_khonl);
    }
    public function huyBH()
    {
        $this->AuthLogin();
        return redirect("/add-baihoc");
    }
    //upload video
    public function save_baihoc(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenbh'] = $request->txtTenbaihoc;
        $data['Lythuyet'] = $request->txtLythuyet;
        $data['video'] = $request->videoBaihoc;
        $data['makh_onl'] = $request->slkhonl;
        $get_video = $request->file('videoBaihoc');
        if ($get_video) {
            $get_name_video = $get_video->getClientOriginalName();
            $name_video = current(explode('.', $get_name_video));
            $new_video = $name_video . rand(0, 99) . '.' . $get_video->getClientOriginalExtension();
            $get_video->move('public/upload/videobaihoc', $new_video);
            $data['video'] = $new_video;

            DB::table('baihoc')->insert($data);
            Session::put('message', "Đã thêm!");
            return redirect('allbaihoc');
        } else {
            $data['video'] = null;
            DB::table('baihoc')->insert($data);
            Session::put('message', "Đã thêm!");
            return redirect('allbaihoc');
        }
    }
    public function all_baihoc()
    {
        $this->AuthLogin();
        $all_baihoc = DB::table('baihoc')->get();
        $manager_baihoc = view('adminpages.allbaihoc')->with('all_baihoc', $all_baihoc);
        return view('welcome')->with('adminpages.allbaihoc', $manager_baihoc);
    }
    public function edit_baihoc($mabh)
    {
        $this->AuthLogin();
        $edit_baihoc = DB::table('baihoc')->where('mabh', $mabh)->get();
        $data_khonl = DB::table('khonl')->get();
        return view('adminpages.edit_baihoc')->with('edit_baihoc', $edit_baihoc)->with('all_khonl', $data_khonl);
    }
    public function update_baihoc(Request $request, $mabh)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenbh'] = $request->txtTenbaihoc;
        $data['Lythuyet'] = $request->txtLythuyet;
        $data['video'] = $request->videoBaihoc;
        $data['makh_onl'] = $request->slkhonl;
        $get_video = $request->file('videoBaihoc');
        if ($get_video) {
            $get_name_video = $get_video->getClientOriginalName();
            $name_video = current(explode('.', $get_name_video));
            $new_video = $name_video . rand(0, 99) . '.' . $get_video->getClientOriginalExtension();
            $get_video->move('public/upload/videobaihoc', $new_video);
            $data['video'] = $new_video;

            DB::table('baihoc')->where('mabh', $mabh)->update($data);
            Session::put('message', "Đã Sửa!");
            return redirect('allbaihoc');
        }

        DB::table('baihoc')->where('mabh', $mabh)->update($data);
        Session::put('message', "Đã sửa!");
        return redirect('allbaihoc');
    }
    public function delete_baihoc($mabh)
    {
        $this->AuthLogin();
        DB::table('baihoc')->where('mabh', $mabh)->delete();
        Session::put('message', "Đã xoá !");
        return redirect('/allbaihoc');
    }
    // Khoa hoc online
    public function khonl($madaotao)
    {

        $all_khonl = DB::table('khonl')->where('madaotao', $madaotao)->get();
        $data_daotao = DB::table('daotao')->get();
        // echo '<pre>';
        // print_r($all_khonl);
        // echo '</pre>';
        return view('KHonline.khoahoc_onl')->with('all_onl', $all_khonl)->with('all_daotao', $data_daotao);
    }
    public function chitietkhonl($makh_onl)
    {

        $ctkh_onl = DB::table('khonl')->join('daotao', 'daotao.madaotao', '=', 'khonl.madaotao')->where('makh_onl', $makh_onl)->get();
        $all_daotao = DB::table('daotao')->get();
        // echo '<pre>';
        // print_r($ctkh_onl);
        // echo '</pre>';
        return view('KHonline.ctkhonl', compact('ctkh_onl', 'all_daotao'));
        // return view('KHonline.payment', compact('ctkh_onl', 'all_daotao'));
    }

    public function payment()
    {
        return view('KHonline.payment');
    }
    public function listbaihoc($mabh)
    {   $all_daotao = DB::table('daotao')->get();
        $all_khonl = DB::table('khonl')->where('madaotao', $all_daotao)->get();
        $all_baihoc = DB::table('baihoc')->join('khonl', 'khonl.makh_onl', '=', 'baihoc.makh_onl')->where('mabh', $mabh)->get();
        return view('KHonline.listbaihoc')->with('all_baihoc', $all_baihoc)->with('all_khonl', $all_khonl)->with('all_daotao', $all_daotao);
    }
}
