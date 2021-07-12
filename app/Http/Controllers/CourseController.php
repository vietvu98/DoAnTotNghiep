<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
use Maatwebsite\Excel\Facades\Excel;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\Comment;
use App\Models\Payments;
use App\Models\Social;
use Exception;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

require 'vendor/autoload.php';

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
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        $hvoff = DB::table('dangky')->get()->count();
        $hvonl = DB::table('payments')->get()->count();
        $totalmonmey = DB::table('payments')->get()->sum('p_money');
        $khoff = DB::table('khoahoc')->get()->count();
        $khonl = DB::table('khonl')->get()->count();
        return view('adminpages.adminpage',compact('ct_quyen', 'hvoff','hvonl','totalmonmey','khoff','khonl'));
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
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.changepassword')->with('ct_quyen',$ct_quyen);
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
        $all_daotao = DB::table('daotao')->get();
        //$manage_daotao = view('adminpages.addcourse')->with('all_daotao', $data_daotao);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.addcourse')->with('all_daotao',$all_daotao)->with('ct_quyen',$ct_quyen);
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
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.editcourse')->with('edit_course', $edit_course)->with('all_daotao', $data_daotao)->with('ct_quyen',$ct_quyen);
    }
    public function all_course()
    {
        $this->AuthLogin();
        $all_course = DB::table('khoahoc')->get();
        //$manager_course = view('adminpages.allcourse')->with('all_course', $all_course);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.allcourse')->with('all_course',$all_course)->with('ct_quyen',$ct_quyen);
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
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.add_daotao')->with('ct_quyen',$ct_quyen);
    }
    /////////////////////////////////////////////////////////////////////////////////
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
        $all_daotao = DB::table('daotao')->get();
        //$manage_daotao = view('adminpages.all_daotao')->with('all_daotao', $data);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        //return view('welcome')->with('adminpages.all_daotao', $manage_daotao)->with('ct_quyen',$ct_quyen);
        return view('adminpages.all_daotao')->with('all_daotao',$all_daotao)->with('ct_quyen',$ct_quyen);
    }
    public function edit_daotao($madaotao)
    {
        $this->AuthLogin();
        $all_daotao = DB::table('daotao')->where('madaotao', $madaotao)->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        //$manage_daotao = view('adminpages.edit_daotao')->with('all_daotao', $data);
        return view('adminpages.edit_daotao')->with('all_daotao', $all_daotao)->with('ct_quyen',$ct_quyen);
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
        $matk = Session::get('matk_user');
        $data = DB::table('daotao')->get();
        $all_khonl = DB::table('khonl')->get();
        $payments = DB::table('payments')->join('khonl','khonl.makh_onl','=','payments.makh_onl')->where('p_user_id',$matk)->get();

        return view('KHonline.khoahoc_onl')->with('all_onl', $all_khonl)->with('all_daotao', $data)->with('payments',$payments);
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
        $all_daotao = DB::table('daotao')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        //$manage_daotao = view('adminpages.add_khonl')->with('all_daotao', $data_daotao);
        return view('adminpages.add_khonl')->with('all_daotao',$all_daotao)->with('ct_quyen',$ct_quyen);
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
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        //$manager_khonl = view('adminpages.all_khonl')->with('all_khonl', $all_khonl);
        return view('adminpages.all_khonl')->with('all_khonl',$all_khonl)->with('ct_quyen',$ct_quyen);
    }
    public function edit_khonl($makh_onl)
    {
        $this->AuthLogin();
        $edit_khonl = DB::table('khonl')->where('makh_onl', $makh_onl)->get();
        $data_daotao = DB::table('daotao')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.editkhonl')->with('edit_khonl', $edit_khonl)->with('all_daotao', $data_daotao)->with('ct_quyen', $ct_quyen);
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
        $all_khonl = DB::table('khonl')->get();
        //$manage_khonl = view('adminpages.addbaihoc')->with('all_khonl', $data_khonl);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.addbaihoc')->with('all_khonl',$all_khonl)->with('ct_quyen',$ct_quyen);
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
        //$manager_baihoc = view('adminpages.allbaihoc')->with('all_baihoc', $all_baihoc);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.allbaihoc')->with('all_baihoc',$all_baihoc)->with('ct_quyen',$ct_quyen);
    }
    public function edit_baihoc($mabh)
    {
        $this->AuthLogin();
        $edit_baihoc = DB::table('baihoc')->where('mabh', $mabh)->get();
        $data_khonl = DB::table('khonl')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('adminpages.edit_baihoc')->with('edit_baihoc', $edit_baihoc)->with('all_khonl', $data_khonl)->with('ct_quyen',$ct_quyen);
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
    // Khoa hoc online học viên
    public function khonl($madaotao)
    {
        $matk = Session::get('matk_user');
        $all_khonl = DB::table('khonl')->where('madaotao', $madaotao)->get();
        $data_daotao = DB::table('daotao')->get();
        $payments = DB::table('payments')->join('khonl','khonl.makh_onl','=','payments.makh_onl')->where('p_user_id',$matk)->get();
        // echo '<pre>';
        // print_r($all_khonl);
        // echo '</pre>';
        return view('KHonline.khoahoc_onl')->with('all_onl', $all_khonl)->with('all_daotao', $data_daotao)->with('payments',$payments);
    }
    public function chitietkhonl($makh_onl)
    {   $matk = Session::get('matk_user');
        $ctkh_onl = DB::table('khonl')->join('daotao', 'daotao.madaotao', '=', 'khonl.madaotao')->where('makh_onl', $makh_onl)->get();
        $all_daotao = DB::table('daotao')->get();
        $all_baihoc = DB::table('baihoc')->join('khonl', 'khonl.makh_onl', '=', 'baihoc.makh_onl')->where('baihoc.makh_onl', $makh_onl)->first();
        $payments = DB::table('payments')->where('makh_onl',$makh_onl)->where('p_user_id',$matk)->first();
        if($payments){
            Session::put('xacnhantt','OK');

        }
        else{
            Session::put('xacnhantt',null);

        }
        //dd($payments);
       return view('KHonline.ctkhonl', compact('ctkh_onl', 'all_daotao', 'all_baihoc'));
    }
    // Thanh toán khóa học
    public function payment($makh_onl)
    {
        $matk = Session::get('matk_user');
        Session::put('makh',$makh_onl);
        if ($matk == null) {

            return redirect('/dangnhap');
        } else {
            $ctkh_onl = DB::table('khonl')->join('daotao', 'daotao.madaotao', '=', 'khonl.madaotao')->where('makh_onl', $makh_onl)->get();
            $tenkhonl = DB::table('khonl')->where('makh_onl', $makh_onl)->first('tenkh_onl');
            Session::put('tenkh_onl',$tenkhonl);
            $all_daotao = DB::table('daotao')->get();
            $all_baihoc = DB::table('baihoc')->join('khonl', 'khonl.makh_onl', '=', 'baihoc.makh_onl')->where('baihoc.makh_onl', $makh_onl)->first();
            $hocvien = DB::table('hocvien')->where('matk', $matk)->first();
            return view('KHonline.payment', compact('ctkh_onl',  'all_daotao', 'all_baihoc', 'hocvien'));
        }
    }
    public function createPayment(Request $request)
    {
        $vnp_TxnRef = Str::random(15); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', $request->amount) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $request)
    {

        $matk = Session::get('matk_user');
        $vnpayData = $request->all();
        $hocvien = DB::table('hocvien')->where('matk', $matk)->first();
        //dd($vnpayData);
        if ($request->vnp_ResponseCode == '00') {
            try {
                $tenkh = Session::pull('tenkh_onl');
                $makh = Session::pull('makh');
                $payments = array();
                $TransactionID = Str::random(6);
                $payments['p_transaction_id'] = $TransactionID;
                $payments['p_transaction_code'] = $vnpayData['vnp_TxnRef'];
                $payments['p_user_id'] = $matk;
                $payments['p_hocvien'] = $hocvien->tenhv;
                $payments['makh_onl'] =$makh;

                $payments['p_khonl'] =$tenkh->tenkh_onl;
                $payments['p_money'] = $vnpayData['vnp_Amount']/100;
                $payments['p_note'] = $vnpayData['vnp_OrderInfo'];
                $payments['p_vnp_response_code'] = $vnpayData['vnp_ResponseCode'];
                $payments['p_code_bank'] = $vnpayData['vnp_BankCode'];
                // dd($payments)
                DB::table('payments')->insert($payments);
                $p_tenkhonl = $payments['p_khonl'];
                Session::put('message', "Đã thêm!");
                return view('KHonline.vnpay_return', compact('vnpayData', 'hocvien','p_tenkhonl'));
            } catch (Exception $e) {
                Session::put('erro', "Đã có lỗi xảy ra trong quá tình giao dịch!");
            }
        }
    }

    public function listbaihoc($makh_onl)
    {
        $matk = Session::get('matk_user');
        if ($matk == null) {

            return redirect('/dangnhap');
        } else {
            $all_daotao = DB::table('daotao')->get();
            $all_khonl = DB::table('khonl')->get();
            $all_baihoc = DB::table('baihoc')->where('makh_onl', $makh_onl)->get();
            // echo '<pre>';
            // print_r($all_baihoc);
            // echo '</pre>';
            return view('KHonline.listbaihoc', compact('all_baihoc', 'all_khonl', 'all_daotao'));
        }
    }
    public function ctbaihoc($mabh)
    {
        $all_daotao = DB::table('daotao')->get();
        $ctbh = DB::table('baihoc')->join('khonl', 'khonl.makh_onl', '=', 'baihoc.makh_onl')->where('mabh', $mabh)->get();
        $comment = Comment::where('com_lesson', $mabh)->get();
        return view('KHonline.ctbaihoc', compact('ctbh', 'all_daotao', 'comment'));
    }
    // Comment
    public function postComment($mabh, Request $request)
    {
        $comment = new Comment;
        $id_user  = Session::get('matk_user');
        $ten_user = DB::table('hocvien')->where('matk', $id_user)->first();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment->com_name = $ten_user->tenhv;
        $comment->com_content = $request->content;
        $comment->com_lesson = $mabh;
        $comment->save();
        return back();
    }

    //Bài kiểm tra admin ****

    public function add_exam()
    {
        $this->AuthLogin();
        $all_daotao = DB::table('daotao')->get();
        //$manage_daotao = view('baitest.add_exam')->with('all_daotao', $data_daotao);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('baitest.add_exam')->with('all_daotao',$all_daotao)->with('ct_quyen',$ct_quyen);
    }
    public function save_exam(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenbaitest'] = $request->txtTenkt;
        $data['slcauhoi'] = $request->txtSl;
        $data['diemso'] = $request->txtDiemso;
        $data['madaotao'] = $request->slDaotao;
        DB::table('baitest')->insert($data);
        Session::put('message', "Đã thêm");
        return redirect('/all-exam');
    }
    public function all_exam()
    {
        $this->AuthLogin();

        $all_exam = DB::table('baitest')->get();
        //$manager_exam = view('baitest.all_exam')->with('all_exam', $all_exam);
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('baitest.all_exam')->with('all_exam',$all_exam)->with('ct_quyen',$ct_quyen);
    }
    public function edit_exam($id_baitest)
    {
        $this->AuthLogin();
        $edit_exam = DB::table('baitest')->where('id_baitest', $id_baitest)->get();
        $data_baitest = DB::table('baitest')->get();
        $data_daotao = DB::table('daotao')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('baitest.edit_exam')->with('edit_exam', $edit_exam)->with('all_exam', $data_baitest)->with('all_daotao', $data_daotao)->with('ct_quyen',$ct_quyen);
    }
    public function update_exam(Request $request, $id_baitest)
    {
        $this->AuthLogin();
        $data = array();
        $data['tenbaitest'] = $request->txtTenkt;
        $data['slcauhoi'] = $request->txtSl;
        $data['diemso'] = $request->txtDiemso;
        $data['madaotao'] = $request->slDaotao;
        DB::table('baitest')->where('id_baitest', $id_baitest)->update($data);
        Session::put('message', "Đã sửa");
        return redirect('/all-exam');
    }
    public function delete_exam($id_baitest)
    {
        $this->AuthLogin();
        DB::table('baitest')->where('id_baitest', $id_baitest)->delete();
        Session::put('message', "Đã xóa!");
        return redirect('/all-exam');
    }

    // Export and Import Excel
    public function export_csv()
    {
        return Excel::download(new ExcelExports, 'Danh sách câu hỏi.xlsx');
    }
    public function import_csv(Request $request)
    {
        $path1 = $request->file('file')->store('temp');
        $path=storage_path('app').'/'.$path1;
        Excel::import(new ExcelImports, $path);
        return back();
    }
    public function view_question($id_baitest)
    {
        $this->AuthLogin();
        Session::put('id_baitest', $id_baitest);
        $matk = Session::get('admin_id');
        $exam = DB::table('baitest')->where('id_baitest', $id_baitest)->first();
        if ($exam) {
            $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
            $ds_cauhoi = DB::table('ds_cauhoi')->select(
                    'id_cauhoi',
                    'cauhoi',
                    'luachona',
                    'luachonb',
                    'luachonc',
                    'luachond',
                    'dapan',
                    'id_baitest'
                )
                ->where('id_baitest', $exam->id_baitest)->get();
            return view('baitest.add_question')->with('ds_cauhoi', $ds_cauhoi)->with('ct_quyen', $ct_quyen);
        } else {
            return view('baitest.add_question');
        }
    }
    public function edit_question($id_cauhoi)
    {
        $this->AuthLogin();
        session(['link' => url()->previous()]);
        $question = DB::table('ds_cauhoi')->where('id_cauhoi', $id_cauhoi)->get();
        $exam = DB::table('baitest')->get();
        $matk = Session::get('admin_id');
        $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
        return view('baitest.edit_question')->with('question', $question)->with('exam', $exam)->with('ct_quyen', $ct_quyen);
    }
    public function update_question($id_cauhoi, Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['cauhoi'] =  $request->cauhoi;
        $data['luachona'] = $request->luachona;
        $data['luachonb'] = $request->luachonb;
        $data['luachonc'] = $request->luachonc;
        $data['luachond'] = $request->luachond;
        $data['dapan'] = $request->dapan;
        DB::table('ds_cauhoi')->where('id_cauhoi', $id_cauhoi)->update($data);
        Session::put('message', "Đã sửa");
        return Redirect::to(session('link'));
    }
    public function listexam()
    {
        $matk = Session::get('matk_user');
        if ($matk == null) {

            return redirect('/dangnhap');
        } else {
            $all_daotao = DB::table('daotao')->get();
            $all_baitest = DB::table('baitest')->get();
            $matk = Session::get('admin_id');
            $ct_quyen = DB::table('chitiet_quyen')->where('matk',$matk)->get();
            // echo '<pre>';
            // print_r($all_baitest);
            // echo '</pre>';
            return view('baitest.listexam')->with('all_baitest', $all_baitest)->with('all_daotao', $all_daotao)->with('ct_quyen', $ct_quyen);
        }
    }
    // Bài kiểm tra front-end
    public function baitest($id_baitest)
    {   $all_daotao = DB::table('daotao')->get();
        $exam = DB::table( 'baitest' )->where( 'id_baitest', $id_baitest )->first();
            $question_list = DB::table( 'ds_cauhoi' )
            ->where( 'id_baitest', $id_baitest )
            ->select( 'id_cauhoi', 'cauhoi', 'luachona', 'luachonb', 'luachonc', 'luachond' ,'dapan')
            ->inRandomOrder()
            ->limit( $exam->slcauhoi )
            ->get();
            return view ( 'baitest.baitest' )
            ->with( 'question_list', $question_list )
            ->with( 'exam', $exam )->with('all_daotao',$all_daotao)
            ;
    }
    public function check_question($id_baitest, Request $request ) {

        $all_daotao = DB::table('daotao')->get();
        $exam = DB::table( 'baitest' )->where( 'id_baitest', $id_baitest )->first();
        $data = $request->all();
        unset($data['_token']);

        $dataResult = array();
        foreach($data as $keys => $values){

            $question_list = DB::table( 'ds_cauhoi' )
            ->where( 'id_baitest', $id_baitest )->where('id_cauhoi',$keys)
            ->select( 'id_cauhoi', 'cauhoi', 'luachona', 'luachonb', 'luachonc', 'luachond','dapan')
            ->first();

            array_push($dataResult, $question_list);

        }
        return view ( 'baitest.returnbaitest' )
            ->with( 'data', $data )
            ->with( 'dataResult', $dataResult)->with( 'exam', $exam )->with('all_daotao',$all_daotao)
            ;
    }
}
